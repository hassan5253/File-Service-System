# Web File Sharing Service with Distributed Blocklist  

## 📌 Overview  
This project is a prototype implementation of a **web-based file sharing service** that integrates a **distributed blocklist** to prevent unauthorized file distribution. The system allows users to **upload, download, block, and unblock files**, while administrators can moderate requests via a dedicated interface.  

The main objective is to demonstrate:  
- File sharing functionality through a Laravel web application.  
- Blocklist enforcement using SHA-256 hashes.  
- Secure and user-friendly interaction across frontend, backend, and database.  

This project was developed as part of the **Datenbanken und Web-Techniken** course at **TU Chemnitz**.  

---

## ✨ Features  
- **File Upload & Download**  
  - Upload files up to **10 MB**.  
  - Unique download URL per file.  
  - Meta-information (name, size, upload date) displayed on download page.  

- **Blocklist Integration**  
  - Files checked against TU Chemnitz Blocklist Web Service.  
  - Blocked files cannot be downloaded.  
  - Requests for blocking/unblocking with reasons.  

- **Admin Interface**  
  - Review pending block/unblock requests.  
  - Approve/decline with live blocklist updates.  

- **Usability & Security**  
  - Responsive frontend (desktop + mobile).  
  - Prevention of hot-linking.  
  - Automatic removal of inactive files (14 days).  

- **Additional Features (Group Work)**  
  - Multiple file uploads.  
  - User registration & login (secure password hashing).  
  - File management for registered users.  
  - Rate limiting for unregistered users (speed & time limits).  

---

## 🛠️ Technologies Used  
- **Framework:** Laravel (PHP)  
- **Database:** MySQL  
- **Frontend:** Blade templates, Bootstrap/CSS, JavaScript  
- **API:** RESTful API (Laravel controllers + routes)  
- **Authentication:** Laravel Auth (with hashed passwords)  
- **Blocklist Service:** TU Chemnitz Blocklist Web Service (SHA-256 based)  

---

## 🚀 Installation & Setup  

### 1. Clone the Repository  
```bash
git clone https://github.com/hassan5253/File-Service-System.git
