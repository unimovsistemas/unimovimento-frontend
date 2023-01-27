import { Component } from '@angular/core';
import data from "../../data/footerlinks.json";
import { BlogHelperService } from '../../helper/blog/blog-helper.service';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.css']
})
export class FooterComponent extends BlogHelperService {
  public links = data; 
}
