import { Component } from '@angular/core';
import { DonationHelperService } from 'src/app/components/helper/donation/donation-helper.service';

@Component({
  selector: 'app-projetos',
  templateUrl: './projetos.component.html',
  styleUrls: ['./projetos.component.css']
})
export class ProjetosComponent extends DonationHelperService {
}
