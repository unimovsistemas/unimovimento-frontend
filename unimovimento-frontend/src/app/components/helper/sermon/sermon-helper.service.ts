import { Injectable, AfterContentInit, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import authors from '../../data/volunteer/volunteer.json';
import sermon from '../../data/sermon/sermon.json';
import { DomSanitizer } from '@angular/platform-browser';
import { PlyrComponent } from 'ngx-plyr';

@Injectable({
  providedIn: 'root'
})
export class SermonHelperService implements AfterContentInit, OnInit {
  // pagination
  page: number = 1;
  // Sermon
  public sermonblock = sermon;
  public sermondetails = sermon;
  // Authors
  public author = authors;
  constructor(private route: ActivatedRoute, private sanitizer: DomSanitizer) { }
  // Author
  public getAuthor(items: string | any[]) {
    var elems = authors.filter((item: { id: string; }) => {
      return items.includes(item.id)
    });
    return elems;
  }
  // Sermon Details
  public setSermon(id: any) {
    this.sermondetails = sermon.filter((item: { id: any; }) => { return item.id == id });
  }
  // Recent post
  public changeToMonth(month: string | number | any) {
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    return months[month];
  }
  public setDemoDate() {
    var today = new Date();
    this.sermonblock.slice(0, 3).map((item: { timestamp: number; sermondate: string; }) => (
      item.timestamp = today.getTime() - (3 * 24 * 60 * 60 * 1000),
      // Remove this date on your live demo. This is only used for preview purposed. Your date should actually be updated
      // in the sermon.json object
      item.sermondate = `${today.getDate() - 2}  ${this.changeToMonth(today.getMonth())}, ${today.getFullYear()}`
    ));
  }
  public getNextSermon() {
    var elems = sermon.filter((item: { timestamp: number | any; sermondate: string | number | Date; }) => {
      return item.timestamp < new Date(item.sermondate);
    });
    return elems;
  }
  // Filter
  // Author Filter
  public setAuthor(id: any) {
    this.author = id;
  }
  public getAuthorSermon() {
    return this.author;
  }
  public getSermonsByAuthors(authorId: string) {
    return this.sermonblock = sermon.filter((item: { author: number[]; }) => { return item.author.includes(parseInt(authorId)) });
  }
  // Fetch All filter
  public setSermons() {
    var postsByAuthor = this.getAuthorSermon() != undefined ? this.getSermonsByAuthors(this.getAuthorSermon()) : '';
    if ((postsByAuthor != '' || postsByAuthor != undefined || postsByAuthor != null) && postsByAuthor.length > 0) {
      this.sermonblock = postsByAuthor;
    }
  }
  ngAfterContentInit(): void {
    this.setAuthor(this.route.snapshot.params.authorId);
    this.setSermons();
    this.setSermon(this.route.snapshot.params.id);
  }
  ngOnInit(): void {
    this.setDemoDate();
  }
  // Social Share
  public pageUrl = window.location.href;
  public socialShare(title: string) {
    var socialIcons = [
      {
        title: "facebook",
        iconClass: "fab fa-facebook-f",
        iconStyle: "fb",
        link: "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(this.pageUrl) + ""
      },
      {
        title: "twitter",
        iconClass: "fab fa-twitter",
        iconStyle: "tw",
        link: "http://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "&" + encodeURIComponent(this.pageUrl) + ""
      },
      {
        title: "linkedin",
        iconClass: "fab fa-linkedin-in",
        iconStyle: "ln",
        link: "https://www.linkedin.com/shareArticle?mini=true&url=" + encodeURIComponent(this.pageUrl) + "&title=" + encodeURIComponent(title) + ""
      },
      {
        title: "pinterest",
        iconClass: "fab fa-pinterest-p",
        iconStyle: "gg",
        link: "http://pinterest.com/pin/create/button/?url=" + encodeURIComponent(this.pageUrl) + ""
      }
    ];
    return socialIcons;
  }
  openSocialPopup(social: any) {
    window.open(social.link, "MsgWindow", "width=600,height=600")
  }
  // sanitize url
  public sanitnizeAudioURL(url: string) {
    return this.sanitizer.bypassSecurityTrustResourceUrl(url)
  }
  // get the component instance to have access to plyr instance
  @ViewChild(PlyrComponent)
  plyr: PlyrComponent | undefined;

  // or get it from plyrInit event
  player: Plyr | any;

  audioSources: Plyr.Source[] = [
    {
      src: 'https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.mp3',
      type: 'audio/mp3',
    }
  ];
  play(): void {
    this.player.play(); // or this.plyr.player.play()
  } 
  pause(): void {
    this.player.stop(); // or this.plyr.player.play()
  }
}
