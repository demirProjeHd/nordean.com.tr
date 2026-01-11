"use client"

import { useLanguage } from "@/lib/language-context"
import { Card } from "@/components/ui/card"
import { Leaf, Shield, Package } from "lucide-react"

export function IsolgommaSection() {
  const { t } = useLanguage()

  const features = [
    {
      icon: Shield,
      title: t("isolgomma.feature1"),
      description: t("isolgomma.feature1.desc"),
    },
    {
      icon: Leaf,
      title: t("isolgomma.feature2"),
      description: t("isolgomma.feature2.desc"),
    },
    {
      icon: Package,
      title: t("isolgomma.feature3"),
      description: t("isolgomma.feature3.desc"),
    },
  ]

  return (
    <section className="py-20 md:py-24 bg-muted/50 relative overflow-hidden">
      <div className="absolute inset-0 opacity-5">
        <img src="/green-sustainable-recycled-rubber-materials-textur.jpg" alt="" className="w-full h-full object-cover" />
      </div>

      <div className="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-12">
          <div className="inline-block px-3 py-1 bg-primary/10 text-primary text-sm font-medium rounded-full mb-4">
            {t("isolgomma.badge")}
          </div>
          <h2 className="text-3xl md:text-4xl font-bold mb-6 text-balance">{t("isolgomma.title")}</h2>
          <p className="text-muted-foreground leading-relaxed text-pretty max-w-3xl mx-auto">
            {t("isolgomma.description")}
          </p>
        </div>

        <div className="grid md:grid-cols-3 gap-6">
          {features.map((feature, index) => {
            const Icon = feature.icon
            return (
              <Card key={index} className="p-6 hover:shadow-lg transition-shadow bg-background/80 backdrop-blur-sm">
                <div className="flex flex-col items-center text-center">
                  <div className="p-4 bg-primary/10 rounded-full mb-4">
                    <Icon className="h-8 w-8 text-primary" />
                  </div>
                  <h3 className="font-semibold text-lg mb-2">{feature.title}</h3>
                  <p className="text-sm text-muted-foreground leading-relaxed">{feature.description}</p>
                </div>
              </Card>
            )
          })}
        </div>
      </div>
    </section>
  )
}
