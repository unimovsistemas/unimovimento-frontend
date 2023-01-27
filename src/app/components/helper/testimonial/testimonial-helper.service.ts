import { Injectable } from '@angular/core';
import testimonial from "../../data/testimonials.json";
import author from "../../data/volunteer/volunteer.json";

@Injectable({
  providedIn: 'root'
})
export class TestimonialHelperService {
  // pagination
  public testimonials = testimonial;
  constructor() { }
  // Author
  public getAuthor(items: string | any[]) {
    var elems = author.filter((item: { id: string; }) => {
      return items.includes(item.id)
    });
    return elems;
  }
}
