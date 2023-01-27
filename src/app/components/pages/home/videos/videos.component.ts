import { Component, OnInit } from '@angular/core';
import data from '../../../data/broadcast.json';

@Component({
    selector: 'app-videos',
    templateUrl: './videos.component.html',
    styleUrls: ['./videos.component.css'],
})
export class VideosComponent implements OnInit {
    public broadcast = data;

    constructor() {
    }

    ngOnInit(): void {
    }

}
