import { TestBed } from '@angular/core/testing';

import { DonationHelperService } from './donation-helper.service';

describe('DonationHelperService', () => {
  let service: DonationHelperService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DonationHelperService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
