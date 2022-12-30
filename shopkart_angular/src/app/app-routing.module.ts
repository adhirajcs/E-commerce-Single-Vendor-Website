import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { HomeComponent } from './home/home.component';
import { AboutComponent } from './about/about.component';
import { ContactComponent } from './contact/contact.component';
import { CategoryComponent } from './category/category.component';
import { LoginComponent } from './login/login.component';
import { ListcartComponent } from './listcart/listcart.component';
import { OrderhistoryComponent } from './orderhistory/orderhistory.component';


const routes: Routes = [
  {
    path: '',
    component:HomeComponent

  },
  {
    path: 'about',
    component:AboutComponent

  },
  {
    path: 'contact',
    component:ContactComponent

  },
  {
    path: 'category/:catparam',
    component:CategoryComponent
  },
  {
    path: 'login',
    component:LoginComponent
  },
  {
    path: 'listcart',
    component:ListcartComponent
  },
  {
    path: 'order',
    component:OrderhistoryComponent

  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
