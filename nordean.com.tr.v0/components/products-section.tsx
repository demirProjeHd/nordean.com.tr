"use client"

import { useLanguage } from "@/lib/language-context"
import { Card } from "@/components/ui/card"
import { Home, Building2, Factory } from "lucide-react"

export function ProductsSection() {
  const { t } = useLanguage()

  const products = [
    {
      icon: Home,
      title: t("products.residential"),
      description: t("products.residential.desc"),
      image: "/modern-apartment-interior-with-acoustic-comfort-so.jpg",
    },
    {
      icon: Building2,
      title: t("products.commercial"),
      description: t("products.commercial.desc"),
      image: "/modern-office-meeting-room-with-acoustic-panels-so.jpg",
    },
    {
      icon: Factory,
      title: t("products.industrial"),
      description: t("products.industrial.desc"),
      image: "/industrial-machinery-with-vibration-isolation-and-.jpg",
    },
  ]

  return (
    <section id="products" className="py-20 md:py-24 bg-muted/50">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-12">
          <div className="inline-block px-3 py-1 bg-primary/10 text-primary text-sm font-medium rounded-full mb-4">
            {t("products.badge")}
          </div>
          <h2 className="text-3xl md:text-4xl font-bold mb-6 text-balance">{t("products.title")}</h2>
        </div>

        <div className="grid md:grid-cols-3 gap-8">
          {products.map((product, index) => {
            const Icon = product.icon
            return (
              <Card key={index} className="overflow-hidden hover:shadow-xl transition-shadow group">
                <div className="aspect-[4/3] bg-muted relative overflow-hidden">
                  <img
                    src={product.image || "/placeholder.svg"}
                    alt={product.title}
                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent" />
                  <div className="absolute bottom-4 left-4 p-3 bg-white rounded-lg shadow-lg">
                    <Icon className="h-6 w-6 text-primary" />
                  </div>
                </div>
                <div className="p-6">
                  <h3 className="font-semibold text-xl mb-2">{product.title}</h3>
                  <p className="text-sm text-muted-foreground leading-relaxed">{product.description}</p>
                </div>
              </Card>
            )
          })}
        </div>
      </div>
    </section>
  )
}
