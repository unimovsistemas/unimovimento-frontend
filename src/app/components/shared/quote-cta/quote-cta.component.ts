import { Component, OnInit } from '@angular/core';
import data from "../../data/clients.json";
import { ContactService } from 'src/app/components/helper/contact/contact-helper.service';
import { Contact } from '../../models/contact/contact';

@Component({
  selector: 'app-quote-cta',
  templateUrl: './quote-cta.component.html',
  styleUrls: ['./quote-cta.component.css']
})
export class QuoteCtaComponent implements OnInit {

  public clients = data;
  model = new Contact;
  submitted = false;
  error: {} | undefined; 
  constructor(private contactService: ContactService) { }
  onSubmit() {
    this.submitted = true;
    return this.contactService.contactForm(this.model).subscribe(
      data => this.model = data,
      error => this.error = error
    );
  };
  resolved(captchaResponse: string) {
      console.log(`Resolved response token: ${captchaResponse}`);
  }

  ngOnInit(): void {
  }

}
