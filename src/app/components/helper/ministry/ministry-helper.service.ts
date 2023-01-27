import { Injectable, AfterContentInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import ministry from '../../data/ministry/ministry.json';
import category from '../../data/ministry/category.json';
import { Category } from '../filter/category';
import { Item } from '../filter/item';

@Injectable({
  providedIn: 'root'
})
export class MinistryHelperService implements AfterContentInit {

  // pagination
  page: number = 1;
  // Ministry
  public ministryblock = ministry;
  public ministrydetails = ministry;
  // Category
  public ministrycategory = category;
  public categories = category;
  public activeItem: number;
  constructor(private router: ActivatedRoute) {
    this.activeItem = 0;
  }
  // Category
  public getCategories(items: string | any[]) {
    var elems = category.filter((item: { id: string; }) => {
      return items.includes(item.id)
    });
    return elems;
  }
  // Ministry Details
  public getMinistry(id: any) {
    this.ministrydetails = ministry.filter((item: { id: any; }) => { return item.id == id });
  }
  // Filter
  items: Item[] = ministry;
  category: Category[] = category;
  filteredItems: Item[] | Item[] = [] = [...this.items];
  filterItemsByCategory(category: Category, id: number) {
    this.filteredItems = this.items.filter((item: Item) => {
      return item.category.includes(parseInt(category.id));
    });
    this.activeItem = id
  }
  reset(id: number) {
    this.filteredItems = [...this.items];
    this.activeItem = id
  }
  // Filter
  // Category Filter
  public setCategory(id: any) {
    this.ministrycategory = id;
  }
  public getCategory() {
    return this.ministrycategory;
  }
  public getPostsByCategory(catId: string) {
    return this.ministryblock = ministry.filter((item: { category: number[]; }) => { return item.category.includes(parseInt(catId)) });
  }
  // Fetch All filter
  public setPosts() {
    var postsByCategory = this.getCategory() != undefined ? this.getPostsByCategory(this.getCategory()) : '';

    if ((postsByCategory != '' || postsByCategory != undefined || postsByCategory != null) && postsByCategory.length > 0) {
      this.ministryblock = postsByCategory;
    } 
  }
  ngAfterContentInit(): void {
    this.setCategory(this.router.snapshot.params.catId);
    this.setPosts();
    this.getMinistry(this.router.snapshot.params.id);
  }
  // Social Share
  public pageUrl = window.location.href;
  public socialShare(title: string) {
    var socialIcons = [
      {
        title: "facebook",
        iconClass: "fab fa-facebook-f",
        iconStyle:"fb",
        link: "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(this.pageUrl) + ""
      },
      {
        title: "twitter",
        iconClass: "fab fa-twitter",
        iconStyle:"tw",
        link: "http://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "&" + encodeURIComponent(this.pageUrl) + ""
      },
      {
        title: "linkedin",
        iconClass: "fab fa-linkedin-in",
        iconStyle:"ln",
        link: "https://www.linkedin.com/shareArticle?mini=true&url=" + encodeURIComponent(this.pageUrl) + "&title=" + encodeURIComponent(title) + ""
      },
      {
        title: "pinterest",
        iconClass: "fab fa-pinterest-p",
        iconStyle:"gg",
        link: "http://pinterest.com/pin/create/button/?url=" + encodeURIComponent(this.pageUrl) + ""
      }
    ];
    return socialIcons;
  }
  openSocialPopup(social: any) {
    window.open(social.link, "MsgWindow", "width=600,height=600")
  }
}
