import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/layout/header/header.component';
import { FooterComponent } from './components/layout/footer/footer.component';
import { MainMenuComponent } from './components/main-menu/main-menu.component';
import { AboutComponent } from './components/pages/about/about.component';
import { RacesComponent } from './components/pages/races/races.component';
import { BlogComponent } from './components/pages/blog/blog.component';
import { GalleryComponent } from './components/pages/gallery/gallery.component';
import { ContactComponent } from './components/pages/contact/contact.component';
import { UploadeventComponent } from './components/pages/uploadevent/uploadevent.component';
import { SignupComponent } from './components/pages/signup/signup.component';
import { LoginComponent } from './components/pages/login/login.component';
import { CareersComponent } from './components/pages/careers/careers.component';
import { TermsComponent } from './components/pages/terms/terms.component';
import { PrivacyComponent } from './components/pages/privacy/privacy.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    MainMenuComponent,
    AboutComponent,
    RacesComponent,
    BlogComponent,
    GalleryComponent,
    ContactComponent,
    UploadeventComponent,
    SignupComponent,
    LoginComponent,
    CareersComponent,
    TermsComponent,
    PrivacyComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
