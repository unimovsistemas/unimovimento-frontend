import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AcerteComponent } from './acerte.component';

describe('AboutComponent', () => {
  let component: AcerteComponent;
  let fixture: ComponentFixture<AcerteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AcerteComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AcerteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
