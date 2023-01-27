import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EventSidebarComponent } from './event-sidebar.component';

describe('EventSidebarComponent', () => {
  let component: EventSidebarComponent;
  let fixture: ComponentFixture<EventSidebarComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EventSidebarComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EventSidebarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
