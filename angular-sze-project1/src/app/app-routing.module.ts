import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { MainMenuComponent } from './components/main-menu/main-menu.component'
import { AboutComponent } from './components/pages/about/about.component'
import { RacesComponent } from './components/pages/races/races.component'
import { BlogComponent } from './components/pages/blog/blog.component'

const routes: Routes = [
  { path: '', component: MainMenuComponent },
  { path: 'about', component: AboutComponent },
  { path: 'races', component: RacesComponent },
  { path: 'blog', component: BlogComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
