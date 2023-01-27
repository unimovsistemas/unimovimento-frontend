import { Component, OnInit } from '@angular/core';
import data from "../../data/insta.json";

@Component({
  selector: 'app-canvas',
  templateUrl: './canvas.component.html',
  styleUrls: ['./canvas.component.css']
})
export class CanvasComponent implements OnInit {
  public insta = data;
  constructor() { }

  ngOnInit(): void {
  }

}
