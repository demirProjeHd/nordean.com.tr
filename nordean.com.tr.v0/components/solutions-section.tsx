"use client"

import { useLanguage } from "@/lib/language-context"
import { Card } from "@/components/ui/card"
import { Layers, Wallet as Wall, ChevronsUp, Activity } from "lucide-react"

export function SolutionsSection() {
  const { t } = useLanguage()

  const solutions = [
    {
      icon: Layers,
      title: t("solutions.floor"),
      description: t("solutions.floor.desc"),
      image: "/acoustic-floating-floor-installation-with-insulati.jpg",
    },
    {
      icon: Wall,
      title: t("solutions.wall"),
      description: t("solutions.wall.desc"),
      image: "/soundproof-wall-with-acoustic-panels-installation.jpg",
    },
    {
      icon: ChevronsUp,
      title: t("solutions.ceiling"),
      description: t("solutions.ceiling.desc"),
      image: "/acoustic-ceiling-insulation-with-suspended-system.jpg",
    },
    {
      icon: Activity,
      title: t("solutions.vibration"),
      description: t("solutions.vibration.desc"),
      image: "/industrial-vibration-damping-system-with-rubber-ma.jpg",
    },
  ]

  return (
    <section id="solutions" className="py-20 md:py-24 bg-background">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-12">
          <div className="inline-block px-3 py-1 bg-primary/10 text-primary text-sm font-medium rounded-full mb-4">
            {t("solutions.badge")}
          </div>
          <h2 className="text-3xl md:text-4xl font-bold mb-6 text-balance">{t("solutions.title")}</h2>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
          {solutions.map((solution, index) => {
            const Icon = solution.icon
            return (
              <Card
                key={index}
                className="overflow-hidden hover:shadow-xl transition-all duration-300 group border-border"
              >
                <div className="relative aspect-[4/3] overflow-hidden bg-muted">
                  <img
                    src={solution.image || "/placeholder.svg"}
                    alt={solution.title}
                    className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent" />
                  <div className="absolute bottom-3 left-3 p-2.5 bg-primary rounded-lg shadow-lg">
                    <Icon className="h-5 w-5 text-primary-foreground" />
                  </div>
                </div>
                <div className="p-5">
                  <h3 className="font-semibold text-lg mb-2 group-hover:text-primary transition-colors">
                    {solution.title}
                  </h3>
                  <p className="text-sm text-muted-foreground leading-relaxed">{solution.description}</p>
                </div>
              </Card>
            )
          })}
        </div>
      </div>
    </section>
  )
}
