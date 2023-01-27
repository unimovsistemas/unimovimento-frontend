import { Injectable, AfterContentInit, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import speakers from '../../data/volunteer/volunteer.json';
import event from '../../data/event/event.json';
import eventtags from '../../data/tags.json';

@Injectable({
  providedIn: 'root'
})
export class EventHelperService implements AfterContentInit, OnInit{
  // pagination
  page: number = 1;
  // Event
  public eventblock = event;
  public eventdetails = event;
  // Tags
  public tags = eventtags;
  public eventtags = eventtags;
  // Speakers
  public speaker = speakers;
  constructor(private route: ActivatedRoute) {}
  // Tags
  public getTags(items: string | any[]) {
    var elems = eventtags.filter((item: { id: string; }) => {
      return items.includes(item.id)
    });
    return elems;
  }
  // Speaker
  public getSpeaker(items: string | any[]) {
    var elems = speakers.filter((item: { id: string; }) => {
      return items.includes(item.id)
    });
    return elems;
  }
  // Author
  public getAuthor(items: string | any[]) {
    var elems = speakers.filter((item: { id: string; }) => {
      return items.includes(item.id)
    });
    return elems;
  }
  // Event Details
  public setEvent(id: any) {
    this.eventdetails = event.filter((item: { id: any; }) => { return item.id == id });
  }
  // Recent post
  public changeToMonth(month: string | number | any) {
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    return months[month];
  }
  public changeToDay(day: string | number | any) {
    var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    return days[day];
  }
  public setDemoDate() {
    var today = new Date();
    this.eventblock.slice(0, 3).map((item: { timestamp: number; eventdate: string; }) => (
      item.timestamp = today.getTime() - (3 * 24 * 60 * 60 * 1000),
      // Remove this date on your live demo. This is only used for preview purposed. Your date should actually be updated
      // in the event.json object
      item.eventdate = `${today.getDate() - 2}  ${this.changeToMonth(today.getMonth())}, ${today.getFullYear()}`
    ));
  }
  public getNextEvent() {
    var elems = event.filter((item: { timestamp: number | any; eventdate: string | number | Date; }) => {
      return item.timestamp < new Date(item.eventdate);
    });
    return elems;
  }
  // Get Date
  public getDateInitials(string: string){
    var names = string.split(' '),
      initials = '<span>' + names[0].substring(0, 2) + '</span>';

    if (names.length > 2) {
      initials += names[names.length - 2].substring(0, 3).toUpperCase() + "'21";
    }
    return initials;
  }
  // Filter
  // Tag Filter
  public setTag(id: any) {
    this.eventtags = id;
  }
  public getTag() {
    return this.eventtags;
  }
  public getEventsByTags(tagId: string) {
    return this.eventblock = event.filter((item: { tags: number[]; }) => { return item.tags.includes(parseInt(tagId)) });
  }
  // Speaker Filter
  public setSpeaker(id: any) {
    this.speaker = id;
  }
  public getSpeakerEvent() {
    return this.speaker;
  }
  public getEventsBySpeakers(speakerId: string) {
    return this.eventblock = event.filter((item: { speaker: number[]; }) => { return item.speaker.includes(parseInt(speakerId)) });
  }
  // Fetch All filter
  public setEvents() {
    var postsByTags = this.getTag() != undefined ? this.getEventsByTags(this.getTag()) : '',
      postsBySpeaker = this.getSpeakerEvent() != undefined ? this.getEventsBySpeakers(this.getSpeakerEvent()) : '';

    if ((postsByTags != '' || postsByTags != undefined || postsByTags != null) && postsByTags.length > 0) {
      this.eventblock = postsByTags;
    } else if ((postsBySpeaker != '' || postsBySpeaker != undefined || postsBySpeaker != null) && postsBySpeaker.length > 0) {
      this.eventblock = postsBySpeaker;
    } 
  }
  ngAfterContentInit(): void {
    this.setTag(this.route.snapshot.params.tagId);
    this.setSpeaker(this.route.snapshot.params.speakerId);
    this.setEvents();
    this.setEvent(this.route.snapshot.params.id);
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
