import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { CountUpModule } from 'ngx-countup';
import { SlickCarouselModule } from 'ngx-slick-carousel';
import { SharedModule } from '../../shared/shared.module';
import { BannerComponent } from './banner/banner.component';
import { InstituicaoComponent } from './instituicao/instituicao.component';
import { BlogsComponent } from './blogs/blogs.component';
import { ProjetosComponent } from './projetos/projetos.component';

import { HomeRoutingModule } from './home-routing.module';
import { HomeComponent } from './home.component';
import { LideresComponent } from './lideres/lideres.component';
import { VideosComponent } from './videos/videos.component';


@NgModule({
    declarations: [
        HomeComponent,
        BannerComponent,
        InstituicaoComponent,
        VideosComponent,
        ProjetosComponent,
        LideresComponent,
        BlogsComponent,
    ],
    exports: [
    ],
    imports: [
        CommonModule,
        HomeRoutingModule,
        SharedModule,
        NgbModule,
        SlickCarouselModule,
        CountUpModule,
    ],
})
export class HomeModule {
}
