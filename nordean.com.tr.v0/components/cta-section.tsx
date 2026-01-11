"use client"

import { useLanguage } from "@/lib/language-context"
import { Button } from "@/components/ui/button"
import { ArrowRight } from "lucide-react"

export function CtaSection() {
  const { t } = useLanguage()

  return (
    <section className="py-20 md:py-24 bg-primary text-primary-foreground">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="max-w-3xl mx-auto text-center">
          <h2 className="text-3xl md:text-4xl font-bold mb-6 text-balance">{t("cta.title")}</h2>
          <p className="text-lg text-primary-foreground/90 leading-relaxed mb-8">{t("cta.description")}</p>
          <Button size="lg" variant="secondary" className="gap-2">
            {t("cta.button")}
            <ArrowRight className="h-4 w-4" />
          </Button>
        </div>
      </div>
    </section>
  )
}
