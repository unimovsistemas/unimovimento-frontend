import { Component, OnInit } from '@angular/core';
import data from "../../data/clients.json";

@Component({
  selector: 'app-brands',
  templateUrl: './brands.component.html',
  styleUrls: ['./brands.component.css']
})
export class BrandsComponent implements OnInit {
  public clients = data;
  constructor() { }

  ngOnInit(): void {
  }

}
