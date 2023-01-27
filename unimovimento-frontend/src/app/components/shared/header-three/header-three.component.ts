import { Component, HostListener, OnInit } from "@angular/core";
import { HelperService } from "../../helper/helper.service";
import { ProductService } from "../../helper/shop/product.service";

@Component({
  selector: "app-header-three",
  templateUrl: "./header-three.component.html",
  styleUrls: ["./header-three.component.css"],
})
export class HeaderThreeComponent extends HelperService implements OnInit {
  public cartlength: number | undefined;
  private topPosToStartShowing = 75;

  constructor(
    private productService: ProductService,
  ) {
    super();
  }

  ngOnInit(): void {
    this.cartlength = this.productService.getProductsCountInCart();
    this.productService.watchStorage().subscribe((data) => {
      this.cartlength = this.productService.getProductsCountInCart();
    });
  }

  @HostListener("window:scroll")
  public checkScroll(): void {

    const scrollPosition = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;

    console.log("[scroll]", scrollPosition);

    if (scrollPosition >= this.topPosToStartShowing) {
    }
  }
}
