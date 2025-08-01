# Laravel ChatGPT App 💬⚡

یک اپلیکیشن چت ساده و قدرتمند با ChatGPT، ساخته‌شده با Laravel، Vue.js و OpenAI API.

## 📦 ویژگی‌ها

- اتصال مستقیم به OpenAI API با مدل GPT-4o-mini
- ذخیره‌سازی مکالمات کاربران با قابلیت ادامه گفتگو
- طراحی SPA با Vue.js و Inertia.js
- احراز هویت کاربران با Laravel Breeze یا Jetstream (در صورت فعال بودن)
- معماری تمیز با کنترلرهای مجزا برای عملیات‌های CRUD

## 🧱 ساختار پروژه

```bash
app/
├── Http/
│   └── Controllers/
│       ├── ChatGptDestroyController.php   # حذف چت
│       ├── ChatGptIndexController.php     # نمایش چت‌ها
│       └── ChatGptStoreController.php     # ارسال پیام و دریافت پاسخ از GPT
├── Models/
│   └── Chat.php                           # مدل چت با فیلد context
resources/
└── js/
    └── Pages/
        └── Chat/
            └── ChatIndex.vue              # کامپوننت Vue برای نمایش چت
routes/
└── web.php                                # تعریف مسیرها


🚀 نحوه اجرا
پیش‌نیازها
PHP >= 8.2

Composer

Node.js و npm

کلید API از OpenAI

مراحل نصب

git clone https://github.com/your-username/laravel-chatgpt.git
cd laravel-chatgpt

# نصب وابستگی‌های بک‌اند
composer install

# نصب وابستگی‌های فرانت‌اند
npm install && npm run build

# تنظیم فایل env
cp .env.example .env
php artisan key:generate

# تنظیم کلید OpenAI
OPENAI_API_KEY=your_openai_key_here

# اجرای migration (در صورت وجود)
php artisan migrate

# اجرای سرور
php artisan serve

npm run dev 


🧠 نحوه استفاده
وارد شوید یا ثبت‌نام کنید

یک پیام ارسال کنید

پاسخ از GPT دریافت کنید و مکالمه را ادامه دهید

چت‌ها ذخیره می‌شوند و قابل حذف هستند

🛠 تکنولوژی‌ها

بخش	تکنولوژی‌ها
بک‌اند	Laravel 11+, OpenAI SDK
فرانت‌اند	Vue.js 3, Inertia.js, Tailwind CSS
دیتابیس	MySQL 

📁 مجوز
این پروژه تحت مجوز MIT منتشر شده است.