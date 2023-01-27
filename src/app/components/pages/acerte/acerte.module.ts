import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

import { AcerteRoutingModule } from './acerte-routing.module';
import { AcerteComponent } from './acerte.component';
import { SharedModule } from '../../shared/shared.module';
import { AboutTextComponent } from './about-text/about-text.component';
import { ApprochComponent } from './approch/approch.component';
import { HistoryComponent } from './history/history.component';
import { BlogsComponent } from './blogs/blogs.component';
import { VoluntariosComponent } from './volutarios/voluntarios.component';


@NgModule({
    declarations: [
        AcerteComponent,
        AboutTextComponent,
        ApprochComponent,
        HistoryComponent,
        BlogsComponent,
        VoluntariosComponent,
    ],
    imports: [
        CommonModule,
        AcerteRoutingModule,
        SharedModule,
        NgbModule,
    ],
})
export class AcerteModule {
}
