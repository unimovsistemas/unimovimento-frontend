import { AfterViewInit, AfterContentInit, Injectable, OnInit } from '@angular/core';
import { ProductService } from './product.service';
import { Product } from '../../models/shop/product';
import productblock from '../../data/shop/shop.json';
import productcategory from '../../data/category.json';
import producttag from '../../data/tags.json';
import { ActivatedRoute, Router } from '@angular/router';
import { Options, LabelType } from "@angular-slider/ngx-slider";
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import author from '../../data/volunteer/volunteer.json';
import { Category } from '../filter/category';
import { Item } from '../filter/item';

@Injectable({
  providedIn: 'root'
})
export class ShopService extends ProductService implements AfterContentInit, AfterViewInit, OnInit {
  closeResult: string | undefined;
  modalContent: any;
  // pagination
  page: number = 1;
  shopblock: Product[] = [];
  public producttag = producttag;
  public tags = producttag;
  public category = productcategory;
  public block = productblock;
  public productcategory = productcategory;
  public productblock = productblock;
  public shopdetails = productblock;
  public wishlistlength: number | undefined;
  public cartlength: number | undefined;
  public activeItem: number;
  // Search
  public searchText: string;
  public searchQuery: string;
  // Price
  public minPrice: number;
  public maxPrice: number;
  constructor(
    private modalService: NgbModal,
    private productService: ProductService,
    private router: ActivatedRoute,
    private route: Router
  ) {
    super();
    this.searchText = '';
    this.searchQuery = '';
    this.minPrice = 0;
    this.maxPrice = 0;
    this.activeItem = 1;
  }
  open(content: any, item: any) {
    this.modalContent = item
    this.modalService.open(content, { centered: true, size:"lg", windowClass: 'sigma_quick-view-modal' });
  }
  // Increment decrement
  public counter: number = 1;
  increment() {
    this.counter += 1;
  }
  decrement() {
    this.counter > 1 ? this.counter -= 1 : 1;
  }
  // Category
  public getCategories(items: string | any[]) {
    var elems = productcategory.filter((item: { id: string; }) => {
      return items.includes(item.id)
    });
    return elems;
  }
  // Author
  public getAuthor(items: string | any[]) {
    var elems = author.filter((item: { id: string; }) => {
      return items.includes(item.id)
    });
    return elems;
  }
  // Tag
  public getTags(items: string | any[]) {
    var elems = producttag.filter((item: { id: string; }) => {
      return items.includes(item.id)
    });
    return elems;
  }
  // Featured
  public getFeatured() {
    var elems = productblock.filter((item: { featured: boolean; }) => {
      return item.featured === true
    });
    return elems;
  }
  // Recent post
  public changeToMonth(month: string | number | any) {
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    return months[month];
  }

  public setDemoDate() {
    var today = new Date();
    this.shopblock.slice(0, 3).map((item) => (
      item.timestamp = today.getTime() - (3 * 24 * 60 * 60 * 1000),
      // Remove this date on your live demo. This is only used for preview purposed. Your date should actually be updated
      // in the blog.json object
      item.postdate = `${today.getDate() - 2} ${this.changeToMonth(today.getMonth())}, ${today.getFullYear()}`
    ));
  } 

  public getRecentProduct() {
    var elems = productblock.filter((item: { timestamp: number | any; postdate: string | number | Date; }) => {
      return item.timestamp < new Date(item.postdate);
    });
    return elems;
  }
  // Related Product
  public getProductByCategory(items: string | any[]) {
    var elems = productblock.filter((product: { id: string; category: any[]; }) => { return parseInt(product.id) !== parseInt(this.router.snapshot.params.id) && product.category.some(r => items.includes(r)) });
    return elems;
  }

  // Search 
  onSubmit() {
    if (this.searchText === "") {
      return;
    } else {
      this.route.navigate(['shop/search', this.searchText]);
    }
  }
  // Price filter
  priceFilter: number[] = [0, 100];
  priceFilterOptions: Options = {
    floor: 1,
    ceil: 100,
    translate: (value: number, label: LabelType): string => {
      switch (label) {
        case LabelType.Low:
          return value + " $";
        case LabelType.High:
          return value + " $";
        default:
          return value + " $";
      }
    }
  };
  handlePriceChange() {
    this.minPrice = this.priceFilter[0];
    this.maxPrice = this.priceFilter[1];

    if (this.maxPrice != 0 && this.minPrice != 0) {
      this.route.navigate(['/shop', this.minPrice, this.maxPrice]);
    }
  }
  // Category Filter
  public setCategory(id: number) {
    this.productcategory = id;
  }
  public getCategory() {
    return this.productcategory;
  }
  public getPostsByCategory(catId: string) {
    return this.shopblock = productblock.filter((item: { category: number[]; }) => {
      return item.category.includes(parseInt(catId));
    });
  }

  // Tag Filter
  public setTag(id: number) {
    this.producttag = id;
  }
  public getTag() {
    return this.producttag;
  }
  public getPostsByTag(tagId: string) {
    return this.shopblock = productblock.filter((item: { tags: number[]; }) => {
      return item.tags.includes(parseInt(tagId));
    });
  }

  // Search Filter
  public setSearch(query: string) {
    this.searchQuery = query;
  }
  public getSearch() {
    return this.searchQuery;
  }
  public getPostsBySearch(query: string) {
    return this.shopblock = productblock.filter((item: { title: (string) }) => {
      return item.title.toLowerCase().includes(query.toLowerCase());
    });
  }
  // Price Filter
  public setPrice(minPrice: number, maxPrice: number) {
    this.minPrice = minPrice;
    this.maxPrice = maxPrice;
  }
  public getPrice() {
    return [this.minPrice, this.maxPrice]
  }
  public getPostsByPrice(minPrice: number, maxPrice: number) {
    return this.shopblock = productblock.filter((item: { price: (number) }) => {
      return item.price > minPrice && item.price <= maxPrice
    });
  }
  // Fetch All filter
  public setPosts() {
    var postsByCategory = this.getCategory() != undefined ? this.getPostsByCategory(this.getCategory()) : '';
    var postsBySearch = this.getSearch() != undefined ? this.getPostsBySearch(this.getSearch()) : '';
    var postsByTag = this.getTag() != undefined ? this.getPostsByTag(this.getTag()) : '';
    var postsByPrice = this.getPrice() != undefined ? this.getPostsByPrice(this.getPrice()[0], this.getPrice()[1]) : '';

    if ((postsByCategory != undefined && postsByCategory != []) && postsByCategory.length > 0) {
      this.shopblock = postsByCategory;
    } else if ((postsBySearch != undefined && postsBySearch != []) && postsBySearch.length > 0) {
      this.shopblock = postsBySearch;
    } else if ((postsByTag != undefined && postsByTag != []) && postsByTag.length > 0) {
      this.shopblock = postsByTag;
    } else if ((postsByPrice != undefined && postsByPrice != []) && postsByPrice.length > 0) {
      this.shopblock = postsByPrice;
    } else {
      this.shopblock = this.productService.getProducts();
    }
  }
  //Detail
  public setProduct(id: any) {
    this.shopdetails = productblock.filter((item: { id: any; }) => { return item.id == id });
  }
  ngAfterContentInit(): void {
    this.setSearch(this.router.snapshot.params.query);
    this.setCategory(this.router.snapshot.params.catId);
    this.setTag(this.router.snapshot.params.tagId);
    this.setPrice(this.router.snapshot.params.minPrice, this.router.snapshot.params.maxPrice);
    this.setPosts();
    this.setProduct(this.router.snapshot.params.id);
  }
  ngAfterViewInit(): void {

  }
  ngOnInit(): void {
    this.shopblock = this.productService.getProducts();
    this.setCategoriesCount();
    this.setDemoDate();
    this.cartlength = this.productService.getProductsCountInCart();
    this.wishlistlength = this.productService.getProductsCountInWishlist();
    this.productService.watchStorage().subscribe((data) => {
      this.cartlength = this.productService.getProductsCountInCart();
      this.wishlistlength = this.productService.getProductsCountInWishlist();
    })
  }
  public setCategoriesCount() {
    for (var i = 0; i < this.productcategory.length; i++) {
      var count = this.productblock.filter((product: { category: number[]; }) => { return product.category.includes(parseInt(this.productcategory[i].id)) });
      count = count.length;
      this.productcategory[i].count = count;
    }
  }
  // Social Share
  public pageUrl = window.location.href;
  public socialShare(title: string) {
    var socialIcons = [
      {
        title: "facebook",
        iconClass: "fab fa-facebook-f",
        link: "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(this.pageUrl) + ""
      },
      {
        title: "twitter",
        iconClass: "fab fa-twitter",
        link: "http://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "&" + encodeURIComponent(this.pageUrl) + ""
      },
      {
        title: "linkedin",
        iconClass: "fab fa-linkedin-in",
        link: "https://www.linkedin.com/shareArticle?mini=true&url=" + encodeURIComponent(this.pageUrl) + "&title=" + encodeURIComponent(title) + ""
      },
      {
        title: "pinterest",
        iconClass: "fab fa-pinterest-p",
        link: "http://pinterest.com/pin/create/button/?url=" + encodeURIComponent(this.pageUrl) + ""
      }
    ];
    return socialIcons;
  } 
  openSocialPopup(social: any) {
    window.open(social.link, "MsgWindow", "width=600,height=600")
  }
  // Filter
  items: Item[] = productblock;
  categories: Category[] = productcategory;
  filteredItems: Item[] | Product[] = [] = [...this.items];

  filterItemsByCategory(category: Category, id: number,) {
    this.filteredItems = this.items.filter((item: Item) => {
      return item.category.includes(parseInt(category.id));
    });
    this.activeItem = id
  }
  reset(id: number) {
    this.filteredItems = [...this.items];
    this.activeItem = id
  }
  // Add to cart btn
  public handleAddToCart(product: Product) {
    this.productService.addToCart(product);
  }
  public handleOutofStock() {
    alert('Product Out of Stock')
  }
  public handlePopupAddToCart(product: Product) {
    for (let i = 0; i < this.counter; i++) {
      this.productService.addToCart(product);
    }
  }
  public detailHandleAddToCart(product: Product) {
    for (let i = 0; i < this.counter; i++) {
      this.productService.addToCart(product);
    }
  }
  // Add to Wishlist btn
  public handleAddToWishlist(product: Product) {
    this.productService.addToWishlist(product);
  }
  public handleDeleteFromWishlist(product: Product) {
    if (confirm('Are you sure you want to delete this item from your Wishlist?')) {
      this.productService.deleteFromWishlist(product);
    }
  }
  public isProductInWishlist(id: number) {
    return this.getWishlistProductsFromStorage()?.includes(id.toString());
  }
}
