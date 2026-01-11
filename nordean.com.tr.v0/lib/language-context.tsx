"use client"

import { createContext, useContext, useState, type ReactNode } from "react"

type Language = "tr" | "en"

interface LanguageContextType {
  language: Language
  setLanguage: (lang: Language) => void
  t: (key: string) => string
}

const translations = {
  tr: {
    // Navigation
    "nav.home": "Ana Sayfa",
    "nav.about": "Hakkımızda",
    "nav.products": "Ürünler",
    "nav.solutions": "Çözümler",
    "nav.contact": "İletişim",

    // Hero Section
    "hero.title": "Ses ve Titreşim Yalıtımında Lider Çözümler",
    "hero.subtitle":
      "İtalyan Isolgomma'nın Türkiye'deki tek yetkili distribütörü olarak, en kaliteli akustik yalıtım malzemelerini sunuyoruz.",
    "hero.slide1.title": "Ses ve Titreşim Yalıtımında Lider Çözümler",
    "hero.slide1.subtitle":
      "İtalyan Isolgomma'nın Türkiye'deki tek yetkili distribütörü olarak, en kaliteli akustik yalıtım malzemelerini sunuyoruz.",
    "hero.slide2.title": "Zemin Yalıtımında Üstün Performans",
    "hero.slide2.subtitle":
      "Yüzer döşeme sistemleri ile darbe sesi yalıtımında en etkili çözümler. Konforlu yaşam alanları için profesyonel uygulamalar.",
    "hero.slide3.title": "Duvar ve Bölme Yalıtımı",
    "hero.slide3.subtitle":
      "Hava sesi ve yapısal titreşim kontrolünde yenilikçi malzemeler. Sessiz ve konforlu iç mekanlar için tam çözüm.",
    "hero.slide4.title": "Tavan Akustik Sistemleri",
    "hero.slide4.subtitle":
      "Asma tavan uygulamalarında akustik konfor. Ticari ve konut projelerinde ses kontrolü için özel çözümler.",
    "hero.cta": "Çözümlerimizi Keşfedin",
    "hero.contact": "İletişime Geçin",

    // About Section
    "about.badge": "Hakkımızda",
    "about.title": "Nordean Mühendislik",
    "about.description":
      "Nordean Ltd., İtalyan Isolgomma Srl. firmasının tek yetkili ithalatçısı ve distribütörüdür. Ses ve titreşim yalıtım malzemeleri hususunda global ölçekte bir oyuncu olan Isolgomma Srl'nin yarım asırı aşkın devam eden üretim gücü, teknolojik üstünlüğü ve her detaya uygun ürün çeşitliliği ile Nordean Ltd. firmasının yereldeki bilgi birikimi, teknik açıdan donanımı ve satış/pazarlama alanlarındaki uzmanlığı güçlü bir ticari birliktelik ortaya koymaktadır.",

    // Isolgomma Section
    "isolgomma.badge": "İtalyan Kalitesi",
    "isolgomma.title": "Isolgomma - 50 Yılı Aşkın Tecrübe",
    "isolgomma.description":
      "Kurulduğu 1972 yılından günümüze, Isolgomma yaşam kalitemizi arttırmak amacı ile ürettiği ses yalıtım malzemelerini ve bu malzemeler ile oluşturduğu etkin yalıtım çözümlerini sürekli geliştirerek, İtalya ve Avrupa'nın lider ses yalıtım malzemeleri üreticisi konumuna erişmiştir.",
    "isolgomma.feature1": "Avrupa Lideri",
    "isolgomma.feature1.desc": "1972'den beri ses yalıtımında öncü",
    "isolgomma.feature2": "Çevre Dostu",
    "isolgomma.feature2.desc": "Geri dönüşümlü ham madde kullanımı",
    "isolgomma.feature3": "Geniş Ürün Gamı",
    "isolgomma.feature3.desc": "Her uygulama için özel çözümler",

    // Mission & Vision
    "mission.title": "Misyonumuz",
    "mission.description":
      "Global ölçekte yenilikleri takip ederek, ileri teknoloji ve yüksek standartlara sahip, nitelikli çözümlerde kullanılan yapı malzemelerinin satış ve pazarlama faaliyetlerini yürütmektedir. Ses yalıtımı ve titreşim kontrolü konularında bilgi ve tecrübelerini sektör oyuncularıyla profesyönel çerçevede paylaşmaktadır.",
    "vision.title": "Vizyonumuz",
    "vision.description":
      "Çözüm ortaklarıyla birlikte mühendislik değerlerini odağa koyarak, insanların yaşam konforunu esas alan, yenilikçi çözümlerle sektöre yön veren lider bir marka olmayı hedefler.",

    // Solutions
    "solutions.badge": "Uygulama Alanları",
    "solutions.title": "Kapsamlı Yalıtım Çözümleri",
    "solutions.floor": "Zemin Yalıtımı",
    "solutions.floor.desc": "Yüzer döşeme sistemleri ve darbe sesi yalıtımı",
    "solutions.wall": "Duvar Yalıtımı",
    "solutions.wall.desc": "Hava sesi ve yapısal titreşim kontrolü",
    "solutions.ceiling": "Tavan Yalıtımı",
    "solutions.ceiling.desc": "Asma tavan sistemleri ve akustik paneller",
    "solutions.vibration": "Titreşim Kontrolü",
    "solutions.vibration.desc": "Makine ve ekipman titreşim yalıtımı",

    // Products
    "products.badge": "Ürün Grupları",
    "products.title": "Yenilikçi Yalıtım Ürünleri",
    "products.residential": "Konut Çözümleri",
    "products.residential.desc": "Daireler ve müstakil evler için akustik konfor",
    "products.commercial": "Ticari Yapılar",
    "products.commercial.desc": "Ofis, otel ve AVM projelerinde ses kontrolü",
    "products.industrial": "Endüstriyel",
    "products.industrial.desc": "Fabrika ve üretim tesislerinde titreşim yalıtımı",

    // CTA Section
    "cta.title": "Projeniz için en uygun çözümü birlikte bulalım",
    "cta.description": "Uzman ekibimiz, ses ve titreşim yalıtımı konularında teknik danışmanlık hizmeti sunmaktadır.",
    "cta.button": "Bizimle İletişime Geçin",

    // Footer
    "footer.about.title": "NORDEAN",
    "footer.about.description": "İtalyan Isolgomma'nın Türkiye'deki tek yetkili distribütörü",
    "footer.contact.title": "İletişim",
    "footer.solutions.title": "Çözümler",
    "footer.company.title": "Kurumsal",
    "footer.rights": "Tüm hakları saklıdır.",
  },
  en: {
    // Navigation
    "nav.home": "Home",
    "nav.about": "About",
    "nav.products": "Products",
    "nav.solutions": "Solutions",
    "nav.contact": "Contact",

    // Hero Section
    "hero.title": "Leading Solutions in Sound and Vibration Insulation",
    "hero.subtitle":
      "As the exclusive distributor of Italian Isolgomma in Turkey, we offer the highest quality acoustic insulation materials.",
    "hero.slide1.title": "Leading Solutions in Sound and Vibration Insulation",
    "hero.slide1.subtitle":
      "As the exclusive distributor of Italian Isolgomma in Turkey, we offer the highest quality acoustic insulation materials.",
    "hero.slide2.title": "Superior Performance in Floor Insulation",
    "hero.slide2.subtitle":
      "The most effective solutions for impact sound insulation with floating floor systems. Professional applications for comfortable living spaces.",
    "hero.slide3.title": "Wall and Partition Insulation",
    "hero.slide3.subtitle":
      "Innovative materials for airborne sound and structural vibration control. Complete solution for quiet and comfortable interiors.",
    "hero.slide4.title": "Ceiling Acoustic Systems",
    "hero.slide4.subtitle":
      "Acoustic comfort in suspended ceiling applications. Special solutions for sound control in commercial and residential projects.",
    "hero.cta": "Explore Our Solutions",
    "hero.contact": "Get In Touch",

    // About Section
    "about.badge": "About Us",
    "about.title": "Nordean Engineering",
    "about.description":
      "Nordean Ltd. is the exclusive importer and distributor of Italian Isolgomma Srl. The combination of Isolgomma Srl's half-century of production power, technological superiority, and comprehensive product range with Nordean Ltd.'s local expertise, technical capabilities, and sales/marketing proficiency creates a strong commercial partnership.",

    // Isolgomma Section
    "isolgomma.badge": "Italian Quality",
    "isolgomma.title": "Isolgomma - Over 50 Years of Experience",
    "isolgomma.description":
      "Since its establishment in 1972, Isolgomma has continuously developed sound insulation materials and effective insulation solutions to improve our quality of life, becoming the leading manufacturer of sound insulation materials in Italy and Europe.",
    "isolgomma.feature1": "European Leader",
    "isolgomma.feature1.desc": "Pioneer in sound insulation since 1972",
    "isolgomma.feature2": "Eco-Friendly",
    "isolgomma.feature2.desc": "Using recycled raw materials",
    "isolgomma.feature3": "Wide Product Range",
    "isolgomma.feature3.desc": "Special solutions for every application",

    // Mission & Vision
    "mission.title": "Our Mission",
    "mission.description":
      "Following global innovations, conducting sales and marketing activities of building materials used in qualified solutions with advanced technology and high standards. Sharing knowledge and experience in sound insulation and vibration control with industry players in a professional framework.",
    "vision.title": "Our Vision",
    "vision.description":
      "Together with solution partners, focusing on engineering values, aiming to be a leading brand that directs the sector with innovative solutions that prioritize people's living comfort.",

    // Solutions
    "solutions.badge": "Application Areas",
    "solutions.title": "Comprehensive Insulation Solutions",
    "solutions.floor": "Floor Insulation",
    "solutions.floor.desc": "Floating floor systems and impact sound insulation",
    "solutions.wall": "Wall Insulation",
    "solutions.wall.desc": "Airborne sound and structural vibration control",
    "solutions.ceiling": "Ceiling Insulation",
    "solutions.ceiling.desc": "Suspended ceiling systems and acoustic panels",
    "solutions.vibration": "Vibration Control",
    "solutions.vibration.desc": "Machine and equipment vibration insulation",

    // Products
    "products.badge": "Product Groups",
    "products.title": "Innovative Insulation Products",
    "products.residential": "Residential Solutions",
    "products.residential.desc": "Acoustic comfort for apartments and houses",
    "products.commercial": "Commercial Buildings",
    "products.commercial.desc": "Sound control in office, hotel, and mall projects",
    "products.industrial": "Industrial",
    "products.industrial.desc": "Vibration insulation in factories and production facilities",

    // CTA Section
    "cta.title": "Let's find the most suitable solution for your project together",
    "cta.description": "Our expert team provides technical consultancy services on sound and vibration insulation.",
    "cta.button": "Contact Us",

    // Footer
    "footer.about.title": "NORDEAN",
    "footer.about.description": "Exclusive distributor of Italian Isolgomma in Turkey",
    "footer.contact.title": "Contact",
    "footer.solutions.title": "Solutions",
    "footer.company.title": "Company",
    "footer.rights": "All rights reserved.",
  },
}

const LanguageContext = createContext<LanguageContextType | undefined>(undefined)

export function LanguageProvider({ children }: { children: ReactNode }) {
  const [language, setLanguage] = useState<Language>("tr")

  const t = (key: string): string => {
    return translations[language][key as keyof (typeof translations)["tr"]] || key
  }

  return <LanguageContext.Provider value={{ language, setLanguage, t }}>{children}</LanguageContext.Provider>
}

export function useLanguage() {
  const context = useContext(LanguageContext)
  if (context === undefined) {
    throw new Error("useLanguage must be used within a LanguageProvider")
  }
  return context
}
