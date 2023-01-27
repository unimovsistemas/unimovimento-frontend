import { Component } from '@angular/core';
import { BlogHelperService } from '../../helper/blog/blog-helper.service';
import data from '../../data/feeds.json';
import insta from '../../data/insta.json';

@Component({
  selector: 'app-blog-sidebar',
  templateUrl: './blog-sidebar.component.html',
  styleUrls: ['./blog-sidebar.component.css']
})
export class BlogSidebarComponent extends BlogHelperService {
  public feeds = data;
  public instagram = insta;
}

