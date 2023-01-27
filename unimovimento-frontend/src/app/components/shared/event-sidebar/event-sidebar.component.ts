import { Component } from '@angular/core';
import { EventHelperService } from '../../helper/event/event-helper.service';

@Component({
  selector: 'app-event-sidebar',
  templateUrl: './event-sidebar.component.html',
  styleUrls: ['./event-sidebar.component.css']
})
export class EventSidebarComponent extends EventHelperService {

}
