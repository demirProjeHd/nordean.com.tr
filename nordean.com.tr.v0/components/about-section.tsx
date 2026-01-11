"use client"

import { useLanguage } from "@/lib/language-context"
import { Card } from "@/components/ui/card"
import { Award, Target } from "lucide-react"

export function AboutSection() {
  const { t } = useLanguage()

  return (
    <section id="about" className="py-20 md:py-24 bg-background">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="grid md:grid-cols-2 gap-12 items-center">
          <div>
            <div className="inline-block px-3 py-1 bg-primary/10 text-primary text-sm font-medium rounded-full mb-4">
              {t("about.badge")}
            </div>
            <h2 className="text-3xl md:text-4xl font-bold mb-6 text-balance">{t("about.title")}</h2>
            <p className="text-muted-foreground leading-relaxed text-pretty mb-8">{t("about.description")}</p>

            <div className="relative rounded-lg overflow-hidden aspect-video mb-6">
              <img
                src="/professional-sound-insulation-consultation-archite.jpg"
                alt="NORDEAN Professional Team"
                className="w-full h-full object-cover"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent" />
            </div>
          </div>

          <div className="grid gap-6">
            <Card className="p-6 hover:shadow-lg transition-shadow">
              <div className="flex items-start gap-4">
                <div className="p-3 bg-primary/10 rounded-lg">
                  <Target className="h-6 w-6 text-primary" />
                </div>
                <div>
                  <h3 className="font-semibold text-lg mb-2">{t("mission.title")}</h3>
                  <p className="text-sm text-muted-foreground leading-relaxed">{t("mission.description")}</p>
                </div>
              </div>
            </Card>

            <Card className="p-6 hover:shadow-lg transition-shadow">
              <div className="flex items-start gap-4">
                <div className="p-3 bg-primary/10 rounded-lg">
                  <Award className="h-6 w-6 text-primary" />
                </div>
                <div>
                  <h3 className="font-semibold text-lg mb-2">{t("vision.title")}</h3>
                  <p className="text-sm text-muted-foreground leading-relaxed">{t("vision.description")}</p>
                </div>
              </div>
            </Card>
          </div>
        </div>
      </div>
    </section>
  )
}
