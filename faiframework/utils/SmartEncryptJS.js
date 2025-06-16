class SmartEncryptorJS {
    constructor() {
        this.defaultShift = 15;
    }

    generateKey(text, mode = 'dinamis') {
        if (mode === 'statis-search') {
            return this.hash(text).substr(0, text.length);
        }
        return this.hash(text + Date.now()).substr(0, text.length);
    }

    shiftChar(c, shift) {
        return String.fromCharCode((c.charCodeAt(0) + shift) % 256);
    }

    unshiftChar(c, shift) {
        return String.fromCharCode((c.charCodeAt(0) - shift + 256) % 256);
    }

    encrypt(text, mode = 'dinamis') {
        const shift = mode === 'statis-search' ? this.defaultShift : Math.floor(Math.random() * 25) + 1;
        const key = this.generateKey(text, mode);
        let result = '';

        for (let i = 0; i < text.length; i++) {
            const c = text[i];
            const k = key[i % key.length];
            const xored = String.fromCharCode(c.charCodeAt(0) ^ k.charCodeAt(0));
            result += this.shiftChar(xored, shift);
        }

        const encoded = btoa(result);
        return `${encoded}_${shift}`;
    }

    decrypt(cipher, originalText = '', mode = 'dinamis') {
        const [base64, shiftStr] = cipher.split('_');
        const shift = parseInt(shiftStr);
        const decoded = atob(base64);
        const key = this.generateKey(originalText || decoded, mode);
        let result = '';

        for (let i = 0; i < decoded.length; i++) {
            const c = this.unshiftChar(decoded[i], shift);
            const k = key[i % key.length];
            result += String.fromCharCode(c.charCodeAt(0) ^ k.charCodeAt(0));
        }

        return result;
    }

    hash(str) {
        // Simple SHA256 alternative
        let hash = 0;
        for (let i = 0; i < str.length; i++) {
            hash = (hash << 5) - hash + str.charCodeAt(i);
            hash |= 0;
        }
        return btoa(String(hash));
    }
}