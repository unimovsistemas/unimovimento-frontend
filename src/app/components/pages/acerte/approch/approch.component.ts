import { Component, OnInit } from '@angular/core';
import data from '../../../data/acerte.json';

@Component({
    selector: 'app-approch',
    templateUrl: './approch.component.html',
    styleUrls: ['./approch.component.css'],
})
export class ApprochComponent implements OnInit {
    public approch = data;

    constructor() {
    }

    ngOnInit(): void {
    }

}
