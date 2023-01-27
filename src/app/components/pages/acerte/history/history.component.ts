import { Component, OnInit } from '@angular/core';
import data from "../../../data/history.json";

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html',
  styleUrls: ['./history.component.css']
})
export class HistoryComponent implements OnInit {
  public history = data;
  constructor() { }

  ngOnInit(): void {
  }

}
