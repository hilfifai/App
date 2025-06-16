// lib/js/auth.js
(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD
    define(['../db/idbDB', 'jquery'], factory);
  } else if (typeof module === 'object' && module.exports) {
    // CommonJS/Node
    module.exports = factory(require('../db/idbDB'), require('jquery'));
  } else {
    // Browser global
    root.AuthModule = factory(root.idbDB, root.$);
  }
})(this, function(idbDB, $) {
  'use strict';

  // Validate dependencies
  if (!idbDB || typeof idbDB.openDatabase !== 'function') {
    throw new Error('idbDB dependency is not properly initialized');
  }
  if (!$ || typeof $.ajax !== 'function') {
    throw new Error('jQuery is required for this module');
  }

  const Auth = {
    // Configuration
    config: {
      baseUrl: '',
      sessionStoreName: 'session',
      dbName: 'myAppDB',
      dbVersion: 1
    },

    /**
     * Initialize OTP input listeners
     * @param {string} containerSelector - Selector for OTP container
     * @param {string} hiddenInputId - ID of hidden input to store OTP value
     */
    initOTPInputs(containerSelector, hiddenInputId) {
      const inputs = document.querySelectorAll(`${containerSelector} .otp-input`);
      
      inputs.forEach((input, index) => {
        input.addEventListener("paste", (ev) => {
          const clip = ev.clipboardData.getData("text").trim();
          if (!/^\d{6}$/.test(clip)) {
            ev.preventDefault();
            return;
          }

          const characters = clip.split("");
          inputs.forEach((otpInput, i) => {
            otpInput.value = characters[i] || "";
          });

          this.enableNextBox(inputs[0], 0);
          inputs[5].removeAttribute("disabled");
          inputs[5].focus();
          this.updateOTPValue(inputs, hiddenInputId);
        });

        input.addEventListener("input", () => {
          const currentIndex = Array.from(inputs).indexOf(input);
          const inputValue = input.value.trim();

          if (!/^\d$/.test(inputValue)) {
            input.value = "";
            return;
          }

          if (inputValue && currentIndex < 5) {
            inputs[currentIndex + 1].removeAttribute("disabled");
            inputs[currentIndex + 1].focus();
          }

          if (currentIndex === 4 && inputValue) {
            inputs[5].removeAttribute("disabled");
            inputs[5].focus();
          }

          this.updateOTPValue(inputs, hiddenInputId);
        });

        input.addEventListener("keydown", (ev) => {
          const currentIndex = Array.from(inputs).indexOf(input);
          if (!input.value && ev.key === "Backspace" && currentIndex > 0) {
            inputs[currentIndex - 1].focus();
          }
        });
      });

      // Initial focus
      inputs[0].focus();
    },

    /**
     * Update hidden OTP value
     * @param {NodeList} inputs - OTP input elements
     * @param {string} hiddenInputId - ID of hidden input
     */
    updateOTPValue(inputs, hiddenInputId) {
      let otpValue = "";
      inputs.forEach(input => {
        otpValue += input.value;
      });
      document.getElementById(hiddenInputId).value = otpValue;
    },

    /**
     * Enable next OTP input box
     * @param {HTMLElement} currentInput - Current input element
     * @param {number} currentIndex - Current input index
     */
    enableNextBox(currentInput, currentIndex) {
      const nextIndex = currentIndex + 1;
      const nextInput = currentInput.parentElement.nextElementSibling?.querySelector('.otp-input');
      if (nextInput) {
        nextInput.removeAttribute('disabled');
        nextInput.focus();
      }
    },

    /**
     * Check user login status
     * @returns {Promise<object|boolean>} Session data or false if not logged in
     */
    async checkLoginStatus() {
      try {
        const db = await idbDB.openDatabase(this.config.dbName, this.config.dbVersion, this.config.sessionStoreName);
        const session = await idbDB.getFromStore(db, this.config.sessionStoreName, "current");
        
        if (session && session.isLoggedIn) {
          return session;
        }
        return false;
      } catch (error) {
        console.error('Error checking login status:', error);
        return false;
      }
    },

    /**
     * Save session data
     * @param {object} data - Session data
     * @returns {Promise<boolean>}
     */
    async saveSession(data) {
      try {
        const db = await idbDB.openDatabase(this.config.dbName, this.config.dbVersion, this.config.sessionStoreName);
        const sessionData = {
          id: "current",
          isLoggedIn: data.isLoggedIn,
          userId: data.userId,
          waktuLogin: Date.now(),
          ...(data.isLoggedIn ? {} : { waktuLogout: Date.now() })
        };
        
        await idbDB.saveToStore(db, this.config.sessionStoreName, sessionData);
        return true;
      } catch (error) {
        console.error('Error saving session:', error);
        throw error;
      }
    },

    /**
     * Handle user login
     * @param {string} email - User email
     * @param {string} password - User password
     * @returns {Promise<object>} Response data
     */
    async login(email, password) {
      return new Promise((resolve, reject) => {
        $.ajax({
          type: 'POST',
          url: `${this.config.baseUrl}api/get_login`,
          data: { email, password },
          dataType: 'json',
          success: async (response) => {
            if (response.status) {
              await this.saveSession({
                isLoggedIn: true,
                userId: response.id_apps_user
              });
              resolve(response);
            } else {
              reject(new Error(response.keterangan || 'Login failed'));
            }
          },
          error: (xhr, status, error) => {
            reject(new Error('Login request failed'));
          }
        });
      });
    },

    /**
     * Handle guest registration
     * @param {string} phone - Phone number
     * @returns {Promise<object>} Response data
     */
    async registerGuest(phone) {
      return new Promise((resolve, reject) => {
        $.ajax({
          type: 'POST',
          url: `${this.config.baseUrl}api/register_guest`,
          data: { phone },
          dataType: 'json',
          success: async (response) => {
            if (response.status) {
              await this.saveSession({
                isLoggedIn: true,
                userId: response.id_apps_user
              });
              resolve(response);
            } else {
              reject(new Error(response.keterangan || 'Guest registration failed'));
            }
          },
          error: (xhr, status, error) => {
            reject(new Error('Guest registration request failed'));
          }
        });
      });
    },

    /**
     * Verify OTP code
     * @param {string} code - OTP code
     * @param {string} type - 'wa' or 'email'
     * @returns {Promise<object>} Response data
     */
    async verifyOTP(code, type = 'wa') {
      return new Promise((resolve, reject) => {
        $.ajax({
          type: 'POST',
          url: `${this.config.baseUrl}api/verifikasi_${type}`,
          data: { kode: code },
          dataType: 'json',
          success: (response) => {
            if (response.status) {
              resolve(response);
            } else {
              reject(new Error('Invalid verification code'));
            }
          },
          error: (xhr, status, error) => {
            reject(new Error('Verification request failed'));
          }
        });
      });
    },

    /**
     * Handle user logout
     * @returns {Promise<boolean>}
     */
    async logout() {
      return new Promise((resolve, reject) => {
        $.ajax({
          type: 'POST',
          url: `${this.config.baseUrl}api/get_logout`,
          dataType: 'json',
          success: async (response) => {
            if (response.status) {
              await this.saveSession({
                isLoggedIn: false,
                userId: null
              });
              resolve(true);
            } else {
              reject(new Error(response.keterangan || 'Logout failed'));
            }
          },
          error: (xhr, status, error) => {
            reject(new Error('Logout request failed'));
          }
        });
      });
    },

    /**
     * UI Helper - Show login success
     */
    showLoginSuccess() {
      $('.is_login').show();
      $('.not_login').hide();
    },

    /**
     * UI Helper - Show logout state
     */
    showLogoutState() {
      $('.is_login').hide();
      $('.not_login').show();
    },

    /**
     * Initialize the module
     * @param {object} config - Configuration options
     */
    init(config = {}) {
      this.config = { ...this.config, ...config };
      
      // Initialize database structure
      idbDB.openDatabase(this.config.dbName, this.config.dbVersion, this.config.sessionStoreName)
        .then(db => {
          if (!db.objectStoreNames.contains(this.config.sessionStoreName)) {
            db.createObjectStore(this.config.sessionStoreName, { keyPath: 'id' });
          }
        })
        .catch(console.error);
    }
  };

  return Auth;
});