import { Component } from '@angular/core';
import { WishlistHelperService } from 'src/app/components/helper/shop/wishlist-helper.service';

@Component({
  selector: 'app-small-wishlist',
  templateUrl: './small-wishlist.component.html',
  styleUrls: ['./small-wishlist.component.css']
})
export class SmallWishlistComponent extends WishlistHelperService {

}
