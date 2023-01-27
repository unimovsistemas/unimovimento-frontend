import { TestBed } from '@angular/core/testing';

import { ContactHelperService } from './contact-helper.service';

describe('ContactHelperService', () => {
  let service: ContactHelperService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ContactHelperService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
