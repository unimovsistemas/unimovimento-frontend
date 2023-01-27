import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AcerteComponent } from './acerte.component';

const routes: Routes = [{ path: '', component: AcerteComponent }];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AcerteRoutingModule { }
