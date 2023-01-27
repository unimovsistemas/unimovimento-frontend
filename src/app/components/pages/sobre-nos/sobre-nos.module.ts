import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';

import {SobreNosRoutingModule} from './sobre-nos-routing.module';
import {SobreNosComponent} from './sobre-nos.component';
import {SharedModule} from '../../shared/shared.module';
import {DescricaoComponent} from './descricao/descricao.component';


@NgModule({
    declarations: [
        SobreNosComponent,
        DescricaoComponent
    ],
    imports: [
        CommonModule,
        SobreNosRoutingModule,
        SharedModule,
        NgbModule
    ]
})
export class SobreNosModule {
}
