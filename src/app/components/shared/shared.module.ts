import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { BreadcrumbModule } from 'angular-crumbs';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { FormsModule } from '@angular/forms';
import { RecaptchaModule, RecaptchaFormsModule } from 'ng-recaptcha';
import { NgxSliderModule } from '@angular-slider/ngx-slider';

import { BlogSidebarComponent } from './blog-sidebar/blog-sidebar.component';
import { ShopSidebarComponent } from './shop-sidebar/shop-sidebar.component';
import { EventSidebarComponent } from './event-sidebar/event-sidebar.component';
import { BreadcrumbsComponent } from './breadcrumbs/breadcrumbs.component';
import { CanvasComponent } from './canvas/canvas.component';
import { MobileMenuComponent } from './mobile-menu/mobile-menu.component';
import { SmallCartComponent } from './small-cart/small-cart.component';
import { SmallWishlistComponent } from './small-wishlist/small-wishlist.component';
import { HeaderComponent } from './header/header.component';
import { HeaderTwoComponent } from './header-two/header-two.component';
import { HeaderThreeComponent } from './header-three/header-three.component';
import { FooterComponent } from './footer/footer.component';
import { QuoteCtaComponent } from './quote-cta/quote-cta.component';
import { BrandsComponent } from './brands/brands.component';
import { CtaComponent } from './cta/cta.component';



@NgModule({
  declarations: [
    BlogSidebarComponent,
    ShopSidebarComponent,
    EventSidebarComponent,
    BreadcrumbsComponent,
    CanvasComponent,
    MobileMenuComponent,
    SmallCartComponent,
    SmallWishlistComponent,
    HeaderComponent,
    HeaderTwoComponent,
    HeaderThreeComponent,
    FooterComponent,
    QuoteCtaComponent,
    BrandsComponent,
    CtaComponent
  ],
  imports: [
    CommonModule,
    RouterModule,
    NgbModule,
    BreadcrumbModule,
    FormsModule,
    NgxSliderModule,
    RecaptchaModule, RecaptchaFormsModule
  ],
  exports:[
    BlogSidebarComponent,
    ShopSidebarComponent,
    EventSidebarComponent,
    BreadcrumbsComponent,
    HeaderComponent,
    HeaderTwoComponent,
    HeaderThreeComponent,
    FooterComponent,
    QuoteCtaComponent,
    BrandsComponent,
    CtaComponent
  ]
})
export class SharedModule { }
