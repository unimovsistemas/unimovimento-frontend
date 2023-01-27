import { Component } from '@angular/core';
import { ShopService } from '../../helper/shop/shop.service';

@Component({
  selector: 'app-shop-sidebar',
  templateUrl: './shop-sidebar.component.html',
  styleUrls: ['./shop-sidebar.component.css']
})
export class ShopSidebarComponent extends ShopService {

}
