import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { MainMenuComponent } from './components/main-menu/main-menu.component'
import { AboutComponent } from './components/pages/about/about.component'
import { RacesComponent } from './components/pages/races/races.component'
import { BlogComponent } from './components/pages/blog/blog.component'
import { GalleryComponent } from './components/pages/gallery/gallery.component'
import { ContactComponent } from './components/pages/contact/contact.component'
import { UploadeventComponent } from './components/pages/uploadevent/uploadevent.component'
import { SignupComponent } from './components/pages/signup/signup.component'
import { LoginComponent } from './components/pages/login/login.component'
import { CareersComponent } from './components/pages/careers/careers.component'
import { TermsComponent } from './components/pages/terms/terms.component'
import { PrivacyComponent } from './components/pages/privacy/privacy.component'

const routes: Routes = [
  { path: '', component: MainMenuComponent },
  { path: 'about', component: AboutComponent },
  { path: 'races', component: RacesComponent },
  { path: 'blog', component: BlogComponent },
  { path: 'gallery', component: GalleryComponent },
  { path: 'contact', component: ContactComponent },
  { path: 'uploadevent', component: UploadeventComponent},
  { path: 'signup', component: SignupComponent },
  { path: 'login', component: LoginComponent },
  { path: 'careers', component: CareersComponent },
  { path: 'term', component: TermsComponent },
  { path: 'privacy', component: PrivacyComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
