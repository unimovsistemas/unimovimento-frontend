import { Component, Input, OnInit } from '@angular/core';

@Component({
    selector: 'app-breadcrumbs',
    templateUrl: './breadcrumbs.component.html',
    styleUrls: ['./breadcrumbs.component.css'],
})
export class BreadcrumbsComponent implements OnInit {

    @Input()
    public titulo ? = 'Blog Details';

    @Input()
    public descricao ? = 'Descricao';

    @Input()
    public img ? = 'url(assets/img/fundo-padrao.jpeg)';

    constructor() {
    }

    ngOnInit(): void {
    }

}
