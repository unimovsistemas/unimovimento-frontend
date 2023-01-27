import { Component, OnInit } from '@angular/core';
import data from '../../../data/approch.json';

@Component({
  selector: 'app-descricao',
  templateUrl: './descricao.component.html',
  styleUrls: ['./descricao.component.css']
})
export class DescricaoComponent implements OnInit {
  public approch = data;
  constructor() { }

  ngOnInit(): void {
  }

}
