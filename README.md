# File Manager Application

A full-stack file manager application with backend and frontend components.
## Features
- Fast backend using **Bun** and **Elysia.js**
- RESTful API with **Elysia.js** (Bun runtime)
- Vue frontend 
- Dockerized for quick environment setup
- File operations via Postman or UI
- **ORM**-powered database layer
- Written entirely in **TypeScript**
## Installation

### Prerequisites
- Node.js (recommended LTS version)
- Bun runtime (`npm install -g bun`)
- Docker (for containerized deployment)
- Postman (for API testing)
- TypeScript

### Clone And Setup
```bash
git clone https://github.com/hilfifai/App.git
cd App
cd frontend/filemanager-new
npm install
```
### Install Dependencies
```bash
npm install -g bun eleysia

```
### Run Applications
1. Run with Docker 
```bash
docker-compose up --build
```
Access:

    Frontend: http://localhost:8080

    Backend: http://localhost:3000 

2.  Run Manually
Backend (Bun + Elysia + TypeScript)
```
cd backend
bun run src/index.ts
```
Frontend
```
cd frontend/filemanager-new
npm run serve
```
### Test API with Postman

[Use the following public collection to try out the File Manager API:
](https://www.postman.com/mission-engineer-45200594/workspace/file-manager/collection/39837259-ca4e5e3d-61e4-4608-848e-9f1d65aed90e?action=share&creator=39837259)
