import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import data from '../../../data/bannerthree.json';
import author from '../../../data/volunteer/volunteer.json';

@Component({
    selector: 'app-banner',
    templateUrl: './banner.component.html',
    styleUrls: ['./banner.component.scss'],
})
export class BannerComponent implements OnInit {
    public banner = data;

    public listBanner = [
        {
            titulo: 'Doe Suas Férias Para Cristo - Edição 2023',
            informacao: [
                { dia: null, data: '07/01/2023', checkin: '12h00' },
            ],
            local: 'União da Vitória / PR',
            link: '/doe',
        },
       //  {
       //      titulo: 'Caravana Conferência Influência 2022',
       //      informacao: [
       //          { dia: null, data: '27/08/2022', checkin: '13h00'},
       //      ],
       //      local: 'Piratuba - SC',
       //      link: '/influencia',
       //  },
       // {
       //     titulo: 'Doação - Edição Novembro',
       //     informacao: [
       //         { dia: null, data: '12/11/2022', checkin: '12h30' },
       //     ],
       //     local: 'ADBlu Nova Esperança',
       //     link: '/doacao',
       // },
       // {
       //     titulo: 'VOCARE',
       //     informacao: [
       //         { dia: "Sábado", data: '29/10/2022', horario: '08h00' },
       //     ],
       //     local: 'Rua São Paulo - 890 - Bairro Victor Konder',
       //     link: 'https://amtb.transforme.tech/evento/xp_santa_catarina_2022',
       // },
       // {
       //     titulo: 'Retiro UNI Líderes',
       //     informacao: [
       //         { dia: null, data: '24/09/2022', horario: '14h00' },
       //     ],
       //     local: 'Koinonia (CTM Vida)',
       //     link: '/old/public/retiro',
       // },
    ];

    @ViewChild('myVideo') public video: ElementRef | undefined;


    // Author
    public getAuthor(items: string | any[]) {
        var elems = author.filter((item: { id: string; }) => {
            return items.includes(item.id);
        });
        return elems;
    }

    constructor() {
    }

    settings = {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: false,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    arrows: false
                }
            }
        ]
    }

    ngOnInit(): void {
        this.toggleMute();
    }

    private toggleMute(): void {
        this.video?.nativeElement.play();
    }


}
