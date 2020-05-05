import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { MainMenuComponent } from './components/main-menu/main-menu.component'
import { AboutComponent } from './components/pages/about/about.component'

const routes: Routes = [
  { path: '', component: MainMenuComponent },
  { path: 'about', component: AboutComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
