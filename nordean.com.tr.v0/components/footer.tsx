"use client"

import { useLanguage } from "@/lib/language-context"
import Image from "next/image"
import Link from "next/link"
import { Mail, Phone, MapPin } from "lucide-react"

export function Footer() {
  const { t } = useLanguage()

  return (
    <footer id="contact" className="bg-secondary text-secondary-foreground">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div className="grid md:grid-cols-4 gap-8 mb-8">
          {/* Company Info */}
          <div className="md:col-span-2">
            <Image src="/nordean-logo.png" alt="NORDEAN Logo" width={140} height={47} className="h-12 w-auto mb-4" />
            <p className="text-sm text-secondary-foreground/80 mb-4 max-w-md leading-relaxed">
              {t("footer.about.description")}
            </p>
            <div className="flex flex-col gap-2 text-sm">
              <div className="flex items-start gap-2">
                <MapPin className="h-4 w-4 mt-1 flex-shrink-0 text-primary" />
                <span className="text-secondary-foreground/80">
                  Yeşilkent Mah. Ardıçlı Manolya Cad. Ardıçlı Göl Evleri No:28/6 İç Kapı No:1, Avcılar, İstanbul
                </span>
              </div>
              <div className="flex items-center gap-2">
                <Phone className="h-4 w-4 flex-shrink-0 text-primary" />
                <a
                  href="tel:+905326421443"
                  className="text-secondary-foreground/80 hover:text-primary transition-colors"
                >
                  +90 532 642 14 43
                </a>
              </div>
              <div className="flex items-center gap-2">
                <Mail className="h-4 w-4 flex-shrink-0 text-primary" />
                <a
                  href="mailto:info@nordean.com.tr"
                  className="text-secondary-foreground/80 hover:text-primary transition-colors"
                >
                  info@nordean.com.tr
                </a>
              </div>
            </div>
          </div>

          {/* Solutions */}
          <div>
            <h3 className="font-semibold mb-4">{t("footer.solutions.title")}</h3>
            <ul className="space-y-2 text-sm">
              <li>
                <Link href="#solutions" className="text-secondary-foreground/80 hover:text-primary transition-colors">
                  {t("solutions.floor")}
                </Link>
              </li>
              <li>
                <Link href="#solutions" className="text-secondary-foreground/80 hover:text-primary transition-colors">
                  {t("solutions.wall")}
                </Link>
              </li>
              <li>
                <Link href="#solutions" className="text-secondary-foreground/80 hover:text-primary transition-colors">
                  {t("solutions.ceiling")}
                </Link>
              </li>
              <li>
                <Link href="#solutions" className="text-secondary-foreground/80 hover:text-primary transition-colors">
                  {t("solutions.vibration")}
                </Link>
              </li>
            </ul>
          </div>

          {/* Company */}
          <div>
            <h3 className="font-semibold mb-4">{t("footer.company.title")}</h3>
            <ul className="space-y-2 text-sm">
              <li>
                <Link href="#about" className="text-secondary-foreground/80 hover:text-primary transition-colors">
                  {t("nav.about")}
                </Link>
              </li>
              <li>
                <Link href="#products" className="text-secondary-foreground/80 hover:text-primary transition-colors">
                  {t("nav.products")}
                </Link>
              </li>
              <li>
                <a
                  href="https://www.isolgomma.com"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-secondary-foreground/80 hover:text-primary transition-colors"
                >
                  Isolgomma
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div className="border-t border-secondary-foreground/10 pt-8">
          <div className="flex flex-col md:flex-row justify-between items-center gap-4">
            <p className="text-sm text-secondary-foreground/60">
              © {new Date().getFullYear()} NORDEAN Mühendislik. {t("footer.rights")}
            </p>
            <p className="text-sm text-secondary-foreground/60">www.nordean.com.tr</p>
          </div>
        </div>
      </div>
    </footer>
  )
}
