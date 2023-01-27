import { Injectable } from '@angular/core';
import data from "../../data/donation/donation.json";

@Injectable({
  providedIn: 'root'
})
export class DonationHelperService {
  // pagination
  page: number = 1;
  // Clinic
  public donationblock = data;
  constructor() { }
}
