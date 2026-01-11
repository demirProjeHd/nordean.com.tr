"use client"

import { useLanguage } from "@/lib/language-context"
import { Button } from "@/components/ui/button"
import { ArrowRight, Phone, ChevronLeft, ChevronRight } from "lucide-react"
import { useState, useEffect } from "react"

const slides = [
  {
    image: "/modern-recording-studio-with-acoustic-foam-panels-.jpg",
    titleKey: "hero.slide1.title",
    subtitleKey: "hero.slide1.subtitle",
  },
  {
    image: "/acoustic-floating-floor-installation-with-insulati.jpg",
    titleKey: "hero.slide2.title",
    subtitleKey: "hero.slide2.subtitle",
  },
  {
    image: "/soundproof-wall-with-acoustic-panels-installation.jpg",
    titleKey: "hero.slide3.title",
    subtitleKey: "hero.slide3.subtitle",
  },
  {
    image: "/acoustic-ceiling-insulation-with-suspended-system.jpg",
    titleKey: "hero.slide4.title",
    subtitleKey: "hero.slide4.subtitle",
  },
]

export function HeroSection() {
  const { t } = useLanguage()
  const [currentSlide, setCurrentSlide] = useState(0)

  useEffect(() => {
    const timer = setInterval(() => {
      setCurrentSlide((prev) => (prev + 1) % slides.length)
    }, 5000)
    return () => clearInterval(timer)
  }, [])

  const nextSlide = () => {
    setCurrentSlide((prev) => (prev + 1) % slides.length)
  }

  const prevSlide = () => {
    setCurrentSlide((prev) => (prev - 1 + slides.length) % slides.length)
  }

  const goToSlide = (index: number) => {
    setCurrentSlide(index)
  }

  return (
    <section id="home" className="relative min-h-[600px] md:min-h-[700px] flex items-center overflow-hidden">
      <div className="absolute inset-0">
        {slides.map((slide, index) => (
          <div
            key={index}
            className={`absolute inset-0 transition-opacity duration-1000 ${
              index === currentSlide ? "opacity-100" : "opacity-0"
            }`}
          >
            <img
              src={slide.image || "/placeholder.svg"}
              alt="Acoustic insulation"
              className="w-full h-full object-cover"
            />
            <div className="absolute inset-0 bg-gradient-to-r from-secondary via-secondary/95 to-secondary/70" />
          </div>
        ))}
      </div>

      <div className="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-24 z-10">
        <div className="max-w-3xl">
          <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold text-balance leading-tight mb-6 text-secondary-foreground transition-all duration-500">
            {t(slides[currentSlide].titleKey)}
          </h1>
          <p className="text-lg md:text-xl text-secondary-foreground/90 text-pretty leading-relaxed mb-8 transition-all duration-500">
            {t(slides[currentSlide].subtitleKey)}
          </p>
          <div className="flex flex-col sm:flex-row gap-4">
            <Button size="lg" className="gap-2">
              {t("hero.cta")}
              <ArrowRight className="h-4 w-4" />
            </Button>
            <Button
              size="lg"
              variant="outline"
              className="gap-2 bg-secondary-foreground/10 hover:bg-secondary-foreground/20 border-secondary-foreground/20 text-white hover:text-white"
            >
              <Phone className="h-4 w-4" />
              {t("hero.contact")}
            </Button>
          </div>
        </div>
      </div>

      <button
        onClick={prevSlide}
        className="absolute left-4 top-1/2 -translate-y-1/2 z-20 p-2 rounded-full bg-secondary-foreground/10 hover:bg-secondary-foreground/20 backdrop-blur-sm transition-all"
        aria-label="Previous slide"
      >
        <ChevronLeft className="h-6 w-6 text-secondary-foreground" />
      </button>
      <button
        onClick={nextSlide}
        className="absolute right-4 top-1/2 -translate-y-1/2 z-20 p-2 rounded-full bg-secondary-foreground/10 hover:bg-secondary-foreground/20 backdrop-blur-sm transition-all"
        aria-label="Next slide"
      >
        <ChevronRight className="h-6 w-6 text-secondary-foreground" />
      </button>

      <div className="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-2">
        {slides.map((_, index) => (
          <button
            key={index}
            onClick={() => goToSlide(index)}
            className={`w-2 h-2 rounded-full transition-all ${
              index === currentSlide ? "bg-primary w-8" : "bg-secondary-foreground/40 hover:bg-secondary-foreground/60"
            }`}
            aria-label={`Go to slide ${index + 1}`}
          />
        ))}
      </div>

      {/* Decorative Element */}
      <div className="absolute -right-32 top-1/2 -translate-y-1/2 w-96 h-96 bg-primary/20 rounded-full blur-3xl" />
    </section>
  )
}
