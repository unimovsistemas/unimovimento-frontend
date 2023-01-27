import { Injectable, AfterContentInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import service from '../../data/service/service.json';

@Injectable({
  providedIn: 'root'
})
export class ServiceHelperService implements AfterContentInit {
  // pagination
  page: number = 1;
  public serviceblock = service;
  public servicedetails = service;
  constructor(private router: ActivatedRoute) {}
  // Service Details
  public getService(id: any) {
    this.servicedetails = service.filter((item: { id: any; }) => { return item.id == id });
  }
  ngAfterContentInit(): void {
    this.getService(this.router.snapshot.params.id);
  }
}
