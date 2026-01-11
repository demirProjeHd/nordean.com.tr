"use client"

import { useLanguage } from "@/lib/language-context"
import { Button } from "@/components/ui/button"

export function LanguageSwitcher() {
  const { language, setLanguage } = useLanguage()

  return (
    <div className="flex items-center gap-1 bg-muted rounded-md p-1">
      <Button
        variant={language === "tr" ? "default" : "ghost"}
        size="sm"
        onClick={() => setLanguage("tr")}
        className="h-7 px-3 text-xs font-medium"
      >
        TR
      </Button>
      <Button
        variant={language === "en" ? "default" : "ghost"}
        size="sm"
        onClick={() => setLanguage("en")}
        className="h-7 px-3 text-xs font-medium"
      >
        EN
      </Button>
    </div>
  )
}
