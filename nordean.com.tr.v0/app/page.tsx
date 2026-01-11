"use client"

import { LanguageProvider } from "@/lib/language-context"
import { Header } from "@/components/header"
import { HeroSection } from "@/components/hero-section"
import { AboutSection } from "@/components/about-section"
import { IsolgommaSection } from "@/components/isolgomma-section"
import { SolutionsSection } from "@/components/solutions-section"
import { ProductsSection } from "@/components/products-section"
import { CtaSection } from "@/components/cta-section"
import { Footer } from "@/components/footer"

export default function Home() {
  return (
    <LanguageProvider>
      <div className="min-h-screen">
        <Header />
        <main className="pt-16">
          <HeroSection />
          <AboutSection />
          <IsolgommaSection />
          <SolutionsSection />
          <ProductsSection />
          <CtaSection />
        </main>
        <Footer />
      </div>
    </LanguageProvider>
  )
}
