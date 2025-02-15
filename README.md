<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# FinalAdoptCat - Laravel Adoption Website

![Project Banner](https://res.cloudinary.com/dv8jmnzaf/image/upload/v1739615336/Screenshot_2025-02-15_170723_akolhh.png)

## 📌 About This Project
This repository is the **Final Project for Semester 1** at **IDN Polytechnic**, where I developed a **Cat Adoption Website** using Laravel. This repository serves as a companion to my **Final Project Module**, containing the source code referenced in the documentation.

## 🌟 Features
This website provides various features, including:
- 🐾 **Cat Adoption Submission**
- 📝 **Blog System** (Create, Read, Update, Delete)
- 💬 **Commenting on Blogs**
- ⚡ **User Post Management**
- 🔔 **Notifications System**
- 🛠 **Admin Panel for Website Management**
- 🎨 **Modern UI with Tailwind CSS, Preline, and Flowbite**
- 📊 **More features can be explored directly on the website!**

## 🛠 Technologies Used
- **Laravel** - PHP Framework for Web Development
- **Filament** - Admin Panel and Dashboard Management
- **Tailwind CSS** - Utility-first CSS Framework
- **Preline & Flowbite** - UI Components for Tailwind CSS
- **MySQL** - Relational Database

## 🎥 Demo & Resources
🔗 **Live Website:** [AdoptCat Website](https://adoptcat.ridhsuki.my.id/)  
📑 **Project Module:** [Final Project Documentation](https://drive.google.com/file/d/1hou7E6rViWBELtbBBshFzLTXZZJpkojn/view?usp=sharing)  
📽 **Presentation:** [Canva Presentation](https://www.canva.com/design/DAGYbfrVjtY/r9RXw1rq478rUmFX4nBleA/edit?utm_content=DAGYbfrVjtY&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)  
📌 **Project Management Board:** [To-Do Board on Notion](https://famous-enemy-35d.notion.site/12d8311b0a5980189bdaeaafa8ab9263?v=12d8311b0a598169a75c000c58536733&pvs=4)

## 📸 Screenshots
Here are some screenshots of the website:

<div style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; align-items: center;" align="center">
    <img src="https://res.cloudinary.com/dv8jmnzaf/image/upload/v1739615393/Screenshot_131_dqyc2f.png" width="400" alt="Homepage Screenshot">
    <img src="https://res.cloudinary.com/dv8jmnzaf/image/upload/v1739615396/Screenshot_132_ljdxdr.png" width="400" alt="Detail Adoption Screenshoot">
    <img src="https://res.cloudinary.com/dv8jmnzaf/image/upload/v1739615368/Screenshot_133_m710wv.png" width="400" alt="Blog Page Screenshot">
    <img src="https://res.cloudinary.com/dv8jmnzaf/image/upload/v1739615360/Screenshot_130_q0an2r.png" width="400" alt="Admin Panel Filament Screenshot">
</div>

## 🚀 How to Run the Project Locally
1. **Clone the Repository**
   ```bash
   git clone https://github.com/Ridhsuki/finaladoptcat-app.git
   cd finaladoptcat-app
   ```
2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```
3. **Set Up Environment** 
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Configure Database & Run Migrations.** before that, please edit the connection to the database first
   ```bash
   php artisan migrate
   ```
5. **Clear cache & configurations**
   ```sh
   php artisan config:clear
   php artisan cache:clear
   php artisan view:clear
   ```
6. **Build assets & Run the Project**
   ```bash
   npm run build
   php artisan serve
   ```
7. Open the browser and visit **http://127.0.0.1:8000**

## 📢 Connect with Me
📌 **Facebook**: [Basuki Ridho](https://facebook.com/basuki.ridho.921)  
📷 **Instagram**: [@basukiridhoal](https://www.instagram.com/basukiridhoal/?hl=de)  
🎶 **TikTok**: [@ridhsuki dev](https://www.tiktok.com/@ritsuchi_dev)  
💼 **LinkedIn**: [Basuki Ridho Al Ghifari](https://www.linkedin.com/in/basuki-ridho/)  

---
💖 **Thank you for visiting this repository!** If you find this project helpful, feel free to **star** 🌟 this repository! 🚀


