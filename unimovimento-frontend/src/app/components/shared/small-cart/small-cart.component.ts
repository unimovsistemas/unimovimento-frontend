import { Component } from '@angular/core';
import { CartHelperService } from 'src/app/components/helper/shop/cart-helper.service';

@Component({
  selector: 'app-small-cart',
  templateUrl: './small-cart.component.html',
  styleUrls: ['./small-cart.component.css']
})
export class SmallCartComponent extends CartHelperService {

}
