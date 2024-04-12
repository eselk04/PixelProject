const laptopProducts = [
    {
      id: 1,
      name: "ASUS VivoBook 15",
      price: 3499.99,
      description: "15.6-inch Full HD laptop with Intel Core i5 processor.",
      image: ""
    },
    {
      id: 2,
      name: "HP Pavilion x360",
      price: 2799.99,
      description: "Convertible laptop with touchscreen display and AMD Ryzen 7 processor.",
      image: "https://www.example.com/hp-pavilion-x360.jpg"
    },
    {
      id: 3,
      name: "Lenovo ThinkPad X1 Carbon",
      price: 4999.99,
      description: "Premium ultrabook with Intel Core i7, 16GB RAM, and 1TB SSD.",
      image: "https://www.example.com/lenovo-thinkpad-x1-carbon.jpg"
    },
    {
      id: 4,
      name: "Dell XPS 15",
      price: 3999.99,
      description: "High-performance laptop with 4K OLED display and Intel Core i9 processor.",
      image: "https://www.example.com/dell-xps-15.jpg"
    },
    {
      id: 5,
      name: "Apple MacBook Pro",
      price: 4399.99,
      description: "Powerful laptop with M1 Pro chip, 16GB RAM, and 1TB SSD.",
      image: "https://www.example.com/apple-macbook-pro.jpg"
    },
    {
      id: 6,
      name: "Acer Predator Helios 300",
      price: 2999.99,
      description: "Gaming laptop with NVIDIA GeForce RTX 3060 graphics card and Intel Core i7 processor.",
      image: "https://www.example.com/acer-predator-helios-300.jpg"
    },
    {
      id: 7,
      name: "Microsoft Surface Laptop 4",
      price: 3799.99,
      description: "Thin and light laptop with touchscreen display and AMD Ryzen 5 processor.",
      image: "https://www.example.com/microsoft-surface-laptop-4.jpg"
    },
    {
      id: 8,
      name: "Razer Blade 15",
      price: 4199.99,
      description: "Sleek gaming laptop with 240Hz display and NVIDIA GeForce RTX 3080 graphics card.",
      image: "https://www.example.com/razer-blade-15.jpg"
    },
    {
      id: 9,
      name: "Samsung Galaxy Book Pro",
      price: 3599.99,
      description: "Ultra-thin laptop with Super AMOLED display and Intel Core i5 processor.",
      image: "https://www.example.com/samsung-galaxy-book-pro.jpg"
    },
    {
      id: 10,
      name: "LG Gram 17",
      price: 4599.99,
      description: "Lightweight laptop with 17-inch WQXGA display and Intel Core i7 processor.",
      image: "https://www.example.com/lg-gram-17.jpg"
    },
    {
      id: 11,
      name: "MSI GS66 Stealth",
      price: 3899.99,
      description: "Powerful gaming laptop with NVIDIA GeForce RTX 3070 graphics card and Intel Core i7 processor.",
      image: "https://www.example.com/msi-gs66-stealth.jpg"
    },
    {
      id: 12,
      name: "Google Pixelbook Go",
      price: 3199.99,
      description: "Lightweight Chromebook with 13.3-inch touchscreen display and Intel Core i5 processor.",
      image: "https://www.example.com/google-pixelbook-go.jpg"
    },
    {
      id: 13,
      name: "Huawei MateBook X Pro",
      price: 3299.99,
      description: "Sleek ultrabook with 3K touchscreen display and Intel Core i7 processor.",
      image: "https://www.example.com/huawei-matebook-x-pro.jpg"
    },
    {
      id: 14,
      name: "Alienware m15 R6",
      price: 4999.99,
      description: "Gaming laptop with Alienware Cryo-Tech cooling and NVIDIA GeForce RTX 3090 graphics card.",
      image: "https://www.example.com/alienware-m15-r6.jpg"
    },
    {
      id: 15,
      name: "Xiaomi Mi Notebook Pro",
      price: 3399.99,
      description: "High-performance laptop with 2.5K display and Intel Core i7 processor.",
      image: "https://www.example.com/xiaomi-mi-notebook-pro.jpg"
    },
    {
      id: 16,
      name: "Sony VAIO SX14",
      price: 4799.99,
      description: "Premium business laptop with Full HD display and Intel Core i7 processor.",
      image: "https://www.example.com/sony-vaio-sx14.jpg"
    },
    {
      id: 17,
      name: "Toshiba Portégé X30",
      price: 3699.99,
      description: "Ultra-portable business laptop with Intel Core i5 processor.",
      image: "https://www.example.com/toshiba-portege-x30.jpg"
    },
    {
      id: 18,
      name: "Fujitsu Lifebook U9311",
      price: 3499.99,
      description: "Slim and lightweight business laptop with 13.3-inch display and Intel Core i5 processor.",
      image: "https://www.example.com/fujitsu-lifebook-u9311.jpg"
    },
    {
      id: 19,
      name: "Panasonic Toughbook 55",
      price: 3899.99,
      description: "Rugged laptop with 14-inch display and Intel Core i7 processor.",
      image: "https://www.example.com/panasonic-toughbook-55.jpg"
    },
    {
      id: 20,
      name: "MSI Creator Z16",
      price: 4699.99,
      description: "Creative laptop with 16-inch display and NVIDIA GeForce RTX 3060 graphics card.",
      image: "https://www.example.com/msi-creator-z16.jpg"
    },
    {
      id: 21,
      name: "Razer Book 13",
      price: 4099.99,
      description: "Compact laptop with 13.4-inch display and Intel Core i7 processor.",
      image: "https://www.example.com/razer-book-13.jpg"
    },
    {
      id: 22,
      name: "Dell Latitude 9420",
      price: 3999.99,
      description: "Business laptop with 14-inch display and Intel Core i7 processor.",
      image: "https://www.example.com/dell-latitude-9420.jpg"
    },
    {
      id: 23,
      name: "HP Envy x360",
      price: 3699.99,
      description: "Convertible laptop with AMD Ryzen 5 processor and touchscreen display.",
      image: "https://www.example.com/hp-envy-x360.jpg"
    },
    {
      id: 24,
      name: "Lenovo Yoga 9i",
      price: 4299.99,
      description: "2-in-1 laptop with 14-inch display and Intel Core i7 processor.",
      image: "https://www.example.com/lenovo-yoga-9i.jpg"
    },
    {
      id: 25,
      name: "Acer Swift 5",
      price: 3299.99,
      description: "Ultralight laptop with 14-inch display and Intel Core i5 processor.",
      image: "https://www.example.com/acer-swift-5.jpg"
    },
    {
      id: 26,
      name: "Microsoft Surface Pro 8",
      price: 4499.99,
      description: "Versatile tablet/laptop hybrid with 13-inch display and Intel Core i5 processor.",
      image: "https://www.example.com/microsoft-surface-pro-8.jpg"
    },
    {
      id: 27,
      name: "Samsung Galaxy Book Flex",
      price: 3799.99,
      description: "Convertible laptop with QLED display and Intel Core i5 processor.",
      image: "https://www.example.com/samsung-galaxy-book-flex.jpg"
    },
    {
      id: 28,
      name: "LG UltraGear 17",
      price: 4699.99,
      description: "Gaming laptop with 17-inch display and NVIDIA GeForce RTX 3070 graphics card.",
      image: "https://www.example.com/lg-ultragear-17.jpg"
    },
    {
      id: 29,
      name: "MSI Prestige 14",
      price: 3899.99,
      description: "Slim and stylish laptop with 14-inch display and Intel Core i7 processor.",
      image: "https://www.example.com/msi-prestige-14.jpg"
    },
    {
      id: 30,
      name: "Google Pixelbook",
      price: 3499.99,
      description: "Premium Chromebook with 12.3-inch display and Intel Core i5 processor.",
      image: "https://www.example.com/google-pixelbook.jpg"
    },
    {
      id: 31,
      name: "Huawei MateBook D",
      price: 3199.99,
      description: "Affordable laptop with 15.6-inch display and AMD Ryzen 5 processor.",
      image: "https://www.example.com/huawei-matebook-d.jpg"
    }
  
  ];
  export default laptopProducts;